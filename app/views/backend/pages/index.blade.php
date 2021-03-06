@extends('backend._layouts.main')
@section('content')
<!-- content -->
<div class="admin-content">

    {{ Notification::showAll() }}

    <div class="am-cf am-padding">
        <div class="am-fl am-cf">
            <strong class="am-text-primary am-text-lg">首页</strong> /
            <small>单页</small>
        </div>
    </div>

    <div class="am-g">
        <div class="am-u-sm-12 am-u-md-6">
            <div class="am-btn-toolbar">
                <div class="am-btn-group am-btn-group-xs">

                    <button type="button" class="am-btn am-btn-default" onclick=location.href='{{ URL::route("backend.pages.create")}}'>
                    <span class="am-icon-plus"></span>
                    新增
                    </button>

                    <button type="button" class="am-btn am-btn-default"><span class="am-icon-trash-o"></span> 删除
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="am-g">
        <div class="am-u-sm-12">
            <table class="am-table am-table-striped am-table-hover table-main">
                <thead>

                <tr>
                    <th class="table-check"><input type="checkbox"/></th>
                    <th class="table-id">ID</th>
                    <th class="table-title">标题</th>
                    <th class="table-type">状态</th>
                    <th class="table-type">允许评论</th>
                    <th class="table-set">操作</th>
                </tr>

                </thead>
                <tbody>

                @foreach($pages as $k=> $v)

                <tr>
                    <td><input type="checkbox"/></td>
                    <td>{{ $v->id}}</td>
                    <td><a href="#">{{ $v->title}} </a></td>
                    <td>
                        @if($v->is_open == '0')
                            禁用
                        @else
                            开启
                        @endif
                    </td>
                    <td>
                        @if($v->is_comment == '0')
                            否
                        @else
                            是
                        @endif
                    </td>

                    <td>
                        <div class="am-btn-toolbar">
                            <div class="am-btn-group am-btn-group-xs">

                                {{ Form::open(array('route' => array('backend.pages.edit', $v->id), 'method' => 'get')) }}
                                <button class="am-btn am-btn-default am-btn-xs am-text-secondary"><span
                                        class="am-icon-pencil-square-o"></span> 编辑
                                </button>
                                {{ Form::close() }}

                                {{ Form::open(array('route' => array('backend.pages.destroy', $v->id), 'method' => 'delete')) }}

                                <button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span
                                        class="am-icon-trash-o"></span> 删除
                                </button>

                                {{ Form::close() }}

                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach

                </tbody>
            </table>
            <div class="am-cf">

                {{$pages->links('backend._layouts._page')}}
            </div>
            <hr/>
        </div>

    </div>
</div>
<!-- content end -->

@stop