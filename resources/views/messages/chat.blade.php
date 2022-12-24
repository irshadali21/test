@extends('layouts.app')
@push('styles')
    @include('messages.style')
@endpush
@if (auth()->user()->hasrole('super-admin'))
    @push('pg_btn')
        <button type="button" class="btn btn-sm btn-default" data-toggle="modal" data-target="#messagetoallmodal">
           {{ __('lang.Send To all') }}
        </button>
    @endpush
@endif
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-sm-6">
                    <h1>{{ __('lang.Messages') }}</h1>
                </div>
            </div>
        </div>
    </section>



    <div>
        <div class="layout-wrapper d-lg-flex">
            <div class="chat-leftsidebar">

                <!-- Start chats tab-pane -->
                <div class="tab-pane fade show active">
                    <div class="px-4 pt-4"></div>
                    <div class="px-2">


                        <div class="chat-message-list" data-simplebar>
                            <div class="chat-message-chatlist">
                                @include('messages.tabpane-recent-contact-list')
                            </div>
                        </div>

                    </div>
                    <!-- End chats tab-pane -->
                </div>
                <!-- end tab content -->
            </div>
            <!-- end chat-leftsidebar -->
            <div class="user-chat w-100">
                <div class="d-lg-flex">
                    <div class="w-100" id="messages">
                    </div>
                </div>
            </div>
            <!-- End User chat -->
        </div>
    </div>


    @if (auth()->user()->hasrole('super-admin'))
        <!-- Modal -->
        <div class="modal fade" id="messagetoallmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ __('lang.Send Message to all advisors') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div style="color:red" id="responsefail"></div>
                        <textarea class="form-control" name="messageinputofalladvisor" id="messageinputofalladvisor" cols="50"
                            rows="10"></textarea>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('lang.Close') }}</button>
                        <button type="button" id="sendmessagetoalladvisor" class="btn btn-primary">{{ __('lang.Send') }}</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
@push('scripts')
    <script>
        var my_id = "{{ Auth::id() }}";

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            }
        });
        /**
         *-------------------------------------------------------------
         * Send Message
         *-------------------------------------------------------------
         */
        @if (auth()->user()->hasrole('super-admin'))


            $(document).on("click", "#sendmessagetoalladvisor", function() {
                let massage = $('#messageinputofalladvisor').val();
                console.log(massage);
                if (massage != "") {
                    $.ajax({
                        type: "post",
                        url: "{{ route('sendmessagetoaaladvisor') }}",
                        data: {
                            massage: massage
                        },
                        cache: false,
                        success: function(data) {
                            if (data.success == true) {
                                $('#messagetoallmodal').modal('toggle');
                                location.reload();
                            } else {
                                $('#responsefail').html('there was an error please try again later')
                            }
                        },
                        error: function(jqXHR, status, err) {},
                        complete: function() {

                        }
                    });
                }
            })
        @endif

        $(document).on("click", ".send-chat-message", function() {
            var receiver_id = $(this).attr('data-user');
            var message = $(".chat-input input").val();
            // check if enter key is pressed and message is not null also receiver is selected
            if (message.trim() != "" && receiver_id != "") {
                var datastr = "receiver_id=" + receiver_id + "&message=" + message;
                $.ajax({
                    type: "post",
                    url: "{{ route('sendmessage') }}",
                    data: datastr,
                    cache: false,
                    success: function(data) {
                        getlastmessage(receiver_id);
                    },
                    error: function(jqXHR, status, err) {},
                    complete: function() {
                        $(".chat-input input").val('');
                        scrollSmoothToBottom('chat-conversation');
                    }
                });
            }
        });
        /**
         *-------------------------------------------------------------
         * Select User Chat Open
         *-------------------------------------------------------------
         */

        var firstUser = $('.chat-user-list').find('.user').attr('data-id');
        userclick(firstUser);

        $(".chat-message-chatlist ul li").on('click', function() {
            var id = $(this).attr('user-id');
            userclick(id);
        });

        $(".chat-user-click").on('click', function() {
            var id = $(this).attr('user-id');
            userclick(id);
        });

        function userclick(receiver_id) {
            receiver_userid = receiver_id;
            $(".user").removeClass("active");
            $("#user-" + receiver_id).addClass("active");
            $("#user-" + receiver_id)
                .find(".pending")
                .remove();
            $(".user-profile-sidebar.group-profile-sidebar").hide();
            $("#messages").show();
            $("#group-messages").hide();
            $.ajax({
                type: "get",
                url: "message/" + receiver_id, // need to create this route
                data: "",
                cache: false,
                success: function(data) {
                    $("#messages").html(data.view1);
                    $("#userprofiledetail").html(data.view2);
                    scrollSmoothToBottom('chat-conversation');
                }
            });
        }

        /**
         *-------------------------------------------------------------
         * scrollToBottom
         *-------------------------------------------------------------
         */

        function scrollToBottomFunc() {
            var height = 0;
            $("#chatul li div").each(function(i, value) {
                height += parseInt($(this).height());
            });
            height += "";
            setTimeout(function() {
                $("#messages #chatul")
                    .parent()
                    .parent()
                    .animate({
                            scrollTop: height
                        },
                        1000
                    );
            }, 100);
        }

        function getlastmessage(data) {
            $.ajax({
                type: "get",
                url: "lastmessage/" + data, // need to create this route
                data: "",
                cache: false,
                success: function(data) {
                    $(".chat-conversation #chatul").append(data);
                    scrollSmoothToBottom('chat-conversation');
                }
            });
        }

        const scrollSmoothToBottom = (id) => {
            const element = $(`.${id}`);
            element.animate({
                scrollTop: element.prop("scrollHeight")
            }, 500);
        }
    </script>
@endpush
