@foreach ($messages as $message)
    <li class="{{ $message->from_user == Auth::id() ? 'right' : 'left' }}" id="msg-{{ $message->id }}">
        <div class="conversation-list">
            <div class="chat-avatar">
                <i class="fa fa-user-circle-o fa-6" aria-hidden="true" style="font-size: 25px"></i>
            </div>
            <div class="user-chat-content">
                <div class="ctext-wrap">
                    <div class="ctext-wrap-content">
                        
                            <p class="mb-0" id="aaa">
                                {{ $message->message }}
                            </p>
                       
                        <p class="chat-time mb-0">
                            <i class="ri-time-line align-middle"></i> 
                            <span class="align-middle">{{ date('d M y, h:i a', strtotime($message->created_at)) }}</span>
                        </p>
                    </div>
                    <div class="dropdown align-self-start">
                        <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="ri-more-2-fill"></i>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item copyTextToClipboard" data-text="{{ $message->message }}">{{ __("Copy") }} <i class="ri-file-copy-line float-right text-muted"></i></a>
                            <a class="dropdown-item" href="#">{{ __("Save") }} <i class="ri-save-line float-right text-muted"></i></a>
                            <a class="dropdown-item" href="#">{{ __("Forward") }} <i class="ri-chat-forward-line float-right text-muted"></i></a>
                            <a class="dropdown-item deleteMessage" href="javascript:void(0)" msg-id="{{ $message->id }}">{{ __("Delete") }} <i class="ri-delete-bin-line float-right text-muted"></i></a>
                        </div>
                    </div>
                </div>
                @if ($message->from_user == Auth::id())
                    <div class="conversation-name profile-newname">{{ Auth::user()->name }}</div>
                @else
                    <div class="conversation-name">{{ $chatUser->name }}</div>
                @endif

            </div>
        </div>
    </li>
@endforeach
