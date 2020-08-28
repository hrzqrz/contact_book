@extends('layouts.main')

@section('title', 'خانه')

@section('content')

<div class="container">


    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <!-- Brand/logo -->
        <a class="navbar-brand" href="#">Logo</a>

        <!-- Links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#">Link 1</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link 2</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link 3</a>
            </li>
        </ul>
    </nav>


    <div class="row">

        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading c-list">
                    <span class="title">Contacts
                        <span class="badge badge-pill badge-success">{{App\Contact::all()->count()}}</span>
                    </span>
                    <ul class="pull-right c-controls">
                        <li><a href="#cant-do-all-the-work-for-you" data-toggle="tooltip" data-placement="top"
                                title="Add Contact"><i class="glyphicon glyphicon-plus"></i></a></li>
                        <li><a href="#" class="hide-search" data-command="toggle-search" data-toggle="tooltip"
                                data-placement="top" title="Toggle Search"><i class="fa fa-ellipsis-v"></i></a></li>
                    </ul>
                </div>

                <div class="row" style="display: none;">
                    <div class="col-xs-12">
                        <div class="input-group c-search">
                            <input type="text" class="form-control" id="contact-list-search">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button"><span
                                        class="glyphicon glyphicon-search text-muted"></span></button>
                            </span>
                        </div>
                    </div>
                </div>

                <ul class="list-group" id="contact-list">
                    @foreach($contacts as $contact)
                    <li class="list-group-item">
                        <div class="col-xs-12 col-sm-3">
                            <img src="http://api.randomuser.me/portraits/men/49.jpg" alt="Scott Stevens"
                                class="img-responsive img-circle" />
                        </div>
                        <div class="col-xs-12 col-sm-9">
                            <span class="name">{{$contact->name}}</span><br />
                            <span class="glyphicon glyphicon-map-marker text-muted c-info" data-toggle="tooltip"
                                title="{{$contact->address}}"></span>
                            <span class="visible-xs"> <span class="text-muted">{{$contact->address}}</span><br /></span>
                            <span class="glyphicon glyphicon-earphone text-muted c-info" data-toggle="tooltip"
                                title="{{$contact->phone}}"></span>
                            <span class="visible-xs"> <span class="text-muted">{{$contact->phone}}</span><br /></span>
                            <span class="fa fa-comments text-muted c-info" data-toggle="tooltip"
                                title="{{$contact->email}}"></span>
                            <span class="visible-xs"> <span class="text-muted">{{$contact->email}}</span><br /></span>
                        </div>
                        <div class="clearfix"></div>
                    </li>
                    @endforeach
                </ul>

            </div>
            {!! $contacts->appends( Request::query() )->render() !!}
        </div>

        <div class="col-md-4">
            <ul class="list-group">
                <?php $selected_group =  Request::get('group_id') ?>
                <li class="list-group-item {{empty($selected_group) ? 'active' : ''}} ">
                    <a href="{{route('contacts.index')}}" style="color: white;">All Groups
                        <span class="badge badge-pill badge-success">{{App\Group::all()->count()}}</span>
                    </a>
                </li>
                @foreach(App\Group::all() as $group)
            <li class="list-group-item {{$selected_group == $group->id ? 'active' : ''}}">
                    <a href="{{route('contacts.index', $group->id)}}">
                        {{$group->name}}
                        <span class="badge badge-pill badge-success">{{$group->contacts->count()}}</span>
                    </a>

                </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div id="cant-do-all-the-work-for-you" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog"
        aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="mySmallModalLabel">Ooops!!!</h4>
                </div>
                <div class="modal-body">
                    <p>I am being lazy and do not want to program an "Add User" section into this snippet... So it
                        looks like you'll have to do that for yourself.</p><br />
                    <p><strong>Sorry<br />
                            ~ Mouse0270</strong></p>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScrip Search Plugin -->
    <script src="//rawgithub.com/stidges/jquery-searchable/master/dist/jquery.searchable-1.0.0.min.js"></script>

</div>
@stop
