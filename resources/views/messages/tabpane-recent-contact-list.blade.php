<ul class="list-unstyled chat-list chat-user-list" style="overflow-x: hidden; height: 100vh;">
    @php
        $users_ids = [];
    @endphp
    @foreach ($users as $user)
        @if (!in_array($user->id, $users_ids))
            @php
                $users_ids[] = $user->id;
            @endphp
            <li class="user" data-id="{{ $user->id }}" id="user-{{ $user->id }}" user-id="{{ $user->id }}">
                <a >
                    <div class="media">

                        <div class="chat-user-img align-self-center mr-3">
                            <i class="fa fa-user-circle-o fa-6" aria-hidden="true" style="font-size: 25px"></i>
                        </div>

                        <div class="media-body overflow-hidden">
                            <h5 class="text-truncate font-size-15 mb-1">{{ $user->name }}</h5>
                        </div>
                        @if (date('Y-m-d') == date('Y-m-d', strtotime($user->created_at)))
                            <div class="font-size-11">{{ date('h:i a', strtotime($user->created_at)) }}</div>
                        @else
                            <div class="font-size-11">{{ date('d/m', strtotime($user->created_at)) }}</div>
                        @endif
                    </div>
                </a>
            </li>
        @endif
    @endforeach
</ul>
