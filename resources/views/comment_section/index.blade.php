@extends('layouts.app')

@section('content')
<div class="container">
    <a href="#" class="btn btn-primary reply" data-parent_id="0" data-level="0"> Add Comment</a>
    <div class="row justify-content-center">
        <div class="col-md-12">
            @foreach ($level0 as $level0_tmp)
                <br>
                <div class="row">
                    <div class="col-md-8">
                        <h3>{{ $level0_tmp->name }}</h3>
                        <div class="well">{{ $level0_tmp->comment }}</div>
                        <a href="#" class="btn btn-primary reply" 
                            data-parent_id={{ $level0_tmp->id }}
                            data-level={{ $level0_tmp->level+1 }}>Reply
                        </a>
                    </div>
                </div>
                @if (count($level1)>0)
                    @foreach ($level1 as $level1_tmp)
                        @if ($level0_tmp->id == $level1_tmp->parent_id)
                            <br>
                            <div class="row">
                                <div class="col-md-8" style="padding-left:50px">
                                    <h3>{{ $level1_tmp->name }}</h3>
                                    <div class="well">{{ $level1_tmp->comment }}</div>
                                    <a href="#" class="btn btn-primary reply" 
                                        data-parent_id={{ $level1_tmp->id }}
                                        data-level={{ $level1_tmp->level+1 }}>Reply
                                    </a>
                                </div>
                            </div>

                            @if (count($level2)>0)
                                @foreach ($level2 as $level2_tmp)
                                    @if ($level1_tmp->id == $level2_tmp->parent_id)
                                        <br>
                                        <div class="row">
                                            <div class="col-md-8" style="padding-left:100px">
                                                <h3>{{ $level2_tmp->name }}</h3>
                                                <div class="well">{{ $level2_tmp->comment }}</div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                            
                        @endif
                    @endforeach
                @endif
            @endforeach
        </div>
    </div>

    <div id="reply_modal" style="display:none;">
        @csrf
        <input type="hidden" name="parent_id" id="dialog_parent_id">
        <input type="hidden" name="level" id="dialog_level">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name">
        </div>
        <div class="form-group">
            <label for="coomment">Comment</label>
            <input type="text" class="form-control" name="comment" id="comment">
        </div>
    </div>
</div>
@endsection
