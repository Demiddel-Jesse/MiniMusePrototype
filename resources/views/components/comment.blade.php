<div class="c-comment">
    <x-profile-small :user="$user" :comment="true">
        @php
        $timeDiff = get_time_diff_string($comment->created_at)
        @endphp
        <p>
            Posted
            {{ $timeDiff }}
            ago
        </p>
    </x-profile-small>
    {{ $slot }}
</div>
<div class="c-comment__subComments">
    @foreach ($comment->comments as $subComment)
    <x-comment :user="$subComment->user" :comment="$subComment">
        {{ $subComment->comment }}
    </x-comment>
    @endforeach
</div>
