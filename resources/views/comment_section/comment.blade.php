<br>
<div class="row">
    @php
        $style=$comment->level>0 ? "style=padding-left:".($comment->level*50)."px":"";
    @endphp
    <div class="col-md-8" {{$style}}>
        <h3>{{ $comment->name }}</h3>
        <div class="well">{{ $comment->comment }}</div>
        @if ($comment->level<2)
            <a href="#" class="btn btn-primary reply" 
            data-parent_id="{{ $comment->id }}"
            data-level="{{ $comment->level+1 }}">Reply
            </a>
        @endif
    </div>
</div>
<div class="comment_container"></div>