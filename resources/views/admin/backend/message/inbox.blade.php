@extends('admin.dashboard')
@section('content')
    <div class="page-content">

        <div class="row inbox-wrapper">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3 border-end-lg">
                                <div class="d-flex align-items-center justify-content-between">
                                    <button class="navbar-toggle btn btn-icon border d-block d-lg-none"
                                        data-bs-target=".email-aside-nav" data-bs-toggle="collapse" type="button">
                                        <span class="icon"><i data-feather="chevron-down"></i></span>
                                    </button>
                                    <div class="order-first">
                                        <h4>{{$messages[0]['user']['name']}}</h4>
                                        <p class="text-muted">{{$messages[0]['user']['email']}}</p>
                                    </div>
                                </div>
                                <div class="d-grid my-3">
                                    <a class="btn btn-primary" href="./compose.html">Compose Email</a>
                                </div>
                                <div class="email-aside-nav collapse">
                                    <ul class="nav flex-column">
                                        <li class="nav-item active">
                                            <a class="nav-link d-flex align-items-center" href="../email/inbox.html">
                                                <i data-feather="inbox" class="icon-lg me-2"></i>
                                                Inbox
                                                <span class="badge bg-danger fw-bolder ms-auto">{{$messages->count()}}</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link d-flex align-items-center" href="#">
                                                <i data-feather="mail" class="icon-lg me-2"></i>
                                                Sent Mail
                                            </a>
                                        </li>

                                    </ul>

                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="p-3 border-bottom">
                                    <div class="row align-items-center">
                                        <div class="col-lg-6">
                                            <div class="d-flex align-items-end mb-2 mb-md-0">
                                                <i data-feather="inbox" class="text-muted me-2"></i>
                                                <h4 class="me-1">Inbox</h4>
                                                <span class="text-muted">({{$messages->count()}} new messages)</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <input class="form-control" type="text" placeholder="Search mail...">
                                                <button class="btn btn-light btn-icon" type="button"
                                                    id="button-search-addon"><i data-feather="search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-3 border-bottom d-flex align-items-center justify-content-between flex-wrap">
                                    <div class="d-none d-md-flex align-items-center flex-wrap">
                                        <div class="form-check me-3">
                                            <input type="checkbox" class="form-check-input" id="inboxCheckAll">
                                        </div>
                                        <div class="btn-group me-2">
                                            <button class="btn btn-outline-primary dropdown-toggle"
                                                data-bs-toggle="dropdown" type="button"> With selected <span
                                                    class="caret"></span></button>
                                            <div class="dropdown-menu" role="menu">
                                                <a class="dropdown-item" href="#">Mark as read</a>
                                                <a class="dropdown-item" href="#">Mark as unread</a><a
                                                    class="dropdown-item" href="#">Spam</a>
                                                <div class="dropdown-divider"></div><a class="dropdown-item text-danger"
                                                    href="#">Delete</a>
                                            </div>
                                        </div>
                                        <div class="btn-group me-2">
                                            <button class="btn btn-outline-primary" type="button">Archive</button>
                                            <button class="btn btn-outline-primary" type="button">Span</button>
                                            <button class="btn btn-outline-primary" type="button">Delete</button>
                                        </div>
                                        <div class="btn-group me-2 d-none d-xl-block">
                                            <button class="btn btn-outline-primary dropdown-toggle"
                                                data-bs-toggle="dropdown" type="button">Order by <span
                                                    class="caret"></span></button>
                                            <div class="dropdown-menu" role="menu">
                                                <a class="dropdown-item" href="#">Date</a>
                                                <a class="dropdown-item" href="#">From</a>
                                                <a class="dropdown-item" href="#">Subject</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">Size</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-end flex-grow-1">
                                        <span class="me-2">1-10 of 253</span>
                                        <div class="btn-group">
                                            <button class="btn btn-outline-secondary btn-icon" type="button"><i
                                                    data-feather="chevron-left"></i></button>
                                            <button class="btn btn-outline-secondary btn-icon" type="button"><i
                                                    data-feather="chevron-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="email-list">

                                    @foreach($messages as $message)
                                    <!-- email list item -->
                                    <div class="email-list-item email-list-item">
                                        <div class="email-list-actions">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input">
                                            </div>
                                            <a class="favorite" href="javascript:;"><span><i
                                                        data-feather="star"></i></span></a>
                                        </div>
                                        <a href="{{route('agent.message.show', $message->id)}}" class="email-list-detail">
                                            <div class="content">
                                                <span class="from">{{$message['user']['name']}}</span>
                                                <p class="msg">{!!$message->message !!}</p>
                                            </div>
                                            <span class="date">
                                                {{ $message->created_at->diffForHumans() }}
                                            </span>
                                        </a>
                                    </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
