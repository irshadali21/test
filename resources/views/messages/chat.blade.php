@extends('layouts.app')
@push('styles')
    @include('messages.style')
@endpush
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Messages</h1>
                </div>
            </div>
        </div>
    </section>




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
                <div class="w-100">
                    <div id="messages">
                    </div>
                </div>
            </div>
        </div>
        <!-- End User chat -->
    </div>
@endsection
@push('scripts')
    <script>
        var my_id = "{{ Auth::id() }}";
        var config = {
            routes: {

            }
        };
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

        $(document).on("click", ".send-chat-message", function() {
            var receiver_id = $(this).attr('data-user');
            var message = $(".chat-input input").val();
            // check if enter key is pressed and message is not null also receiver is selected
            if (message.trim() != "" && receiver_id != "") {
                var datastr = "receiver_id=" + receiver_id + "&message=" + message;
                $.ajax({
                    type: "post",
                    url: "{{ route('sendmessage') }}", // need to create this post route
                    data: datastr,
                    cache: false,
                    success: function(data) {
                        // getlastmessage(receiver_id);
                        $(".chat-conversation #chatul").append(data);
                    },
                    error: function(jqXHR, status, err) {},
                    complete: function() {
                        scrollToBottomFunc();
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
                    scrollToBottomFunc();
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
    </script>
@endpush
