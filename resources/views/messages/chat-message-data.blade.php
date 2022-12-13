<!-- Start chat user head -->
<div class="p-3 p-lg-4 border-bottom">
    <div class="row align-items-center">
        <div class="col-sm-4 col-8">
            <div class="media align-items-center CHATUSER" id="{{ $chatUser->id }}">
                <div class="d-block d-lg-none mr-2">
                    <a href="javascript: void(0);" class="user-chat-remove text-muted font-size-16 p-2"><i
                            class="ri-arrow-left-s-line"></i></a>
                </div>
                <div class="mr-3">
                    <i class="fa fa-user-circle-o fa-6" aria-hidden="true" style="font-size: 25px"></i>
                </div>
                <div class="media-body overflow-hidden">
                    <h5 class="font-size-16 mb-0 text-truncate">
                        <a href="#" class="text-reset user-profile-show"
                            id="user-profile-sender-name">{{ $chatUser->name }}</a>
                            <i class="ri-record-circle-fill font-size-10 text-warning d-inline-block ml-1"></i>
                       
                    </h5>
                </div>
            </div>
        </div>
        <div class="col-sm-8 col-4">
            <ul class="list-inline user-chat-nav text-right mb-0">

            </ul>
        </div>
    </div>
</div>
<!-- end chat user head -->

<!-- start chat conversation -->
<div class="chat-conversation p-3 p-lg-4" data-simplebar="init">
    <ul class="list-unstyled mb-0" id="chatul">
        @include('messages.message-conversation')
    </ul>
</div>
<!-- end chat conversation end -->

<!-- start chat input section -->
<div class="chat-input p-3 p-lg-4 border-top mb-0">
    <div class="row no-gutters">
        <div class="col">
            <div>
                <p class="emoji-picker-container d-flex align-items-end m-0">
                    <input class="input-field form-control form-control-lg bg-light border-light" data-emojiable="true"
                        data-emoji-input="true" type="text" name="comment" id="comment"
                        placeholder="{{ __("Enter Message") }}..." />
                </p>
            </div>
        </div>
        <div class="col-auto">
            <div class="chat-input-links ml-md-2">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item">
                        <button type="button"
                            class="btn btn-primary font-size-16 btn-lg chat-send waves-effect waves-light send-chat-message"
                            data-user="{{ $chatUser->id }}">
                            <i class="ri-send-plane-2-fill"></i>
                        </button>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</div>
<!-- end chat input section -->
