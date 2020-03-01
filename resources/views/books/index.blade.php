@extends('layout.app')

@section('title', 'Books | Books Records')

@section('content-box')
<div class="content-box">
    <div class="row pt-4">
        <div class="col-sm-12">
            <div class="element-wrapper">
                <div class="element-actions">
                    <!-- <a class="btn btn-primary btn-sm" data-target="#onboardingWideFormModal" data-toggle="modal" href="{{ route('book.create') }}"> -->
                    <a class="btn btn-success btn-sm" data-target="#addBookModal" data-toggle="modal" href="#">
                        <i class="os-icon os-icon-ui-22"></i><span>Add Book</span>
                    </a>
                    <!-- <a class="btn btn-primary btn-sm" href="#">
                        <i class="os-icon os-icon-grid-10"></i><span>Make Payment</span>
                    </a> -->
                </div>
                <h6 class="element-header">My Book Records</h6>
                <div class="element-box-tp">
                    <div class="table-responsive">
                        @if(!empty($books))
                        <table class="table table-padded">
                            <thead>
                                <tr>
                                    <th>QR Code</th>
                                    <th class="text-center">Author</th>
                                    <th class="text-center">Book Decription</th>
                                    <!-- <th class="text-center">Book ID</th> -->
                                    <th class="text-center">Book Type</th>
                                    <th class="text-center">Price</th>
                                    <th class="text-center">initial Owner</th>
                                    <th class="text-center">Sold</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($books as $book)
                                <tr>
                                    <td class="text-center">
                                        {!! QrCode::size(100)->generate($book->id); !!}
                                        <span class="smaller">{{ $book->id }}</span>
                                    </td>
                                    <td>
                                        <div class="user-with-avatar">
                                            <img alt="" src="img/avatar1.jpg">
                                            <span class="smaller">{{ $book->author }}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="smaller text-center">{{ $book->description }}</div>
                                    </td>
                                    <td>
                                        <div class="smaller text-center">{{ $book->type }}</div>
                                        <div class="smaller text-center">({{ $book->edition }})</div>
                                    </td>
                                    <td class="nowrap">
                                        <div class="smaller text-center">{{ $book->price }}</div>
                                    </td>
                                    <td class="nowrap">
                                        <div class="smaller text-center">{{ $book->initialOwner }}</div>
                                    </td>
                                    @if($book->sold)
                                    <td class="text-center"><a class="badge badge-danger-inverted" href="#">Sold</a></td>
                                    @else
                                    <td class="text-center"><a class="badge badge-success-inverted" href="#">Not Sold</a></td>
                                    @endif
                                    <td class="row-actions">
                                        <a href="{{ route('verify.book', $book->id) }}" data-placement="top" data-toggle="tooltip" title="Track Book"><i class="os-icon os-icon-truck"></i></a><a onclick="event.preventDefault();editBookForm('{{$book->id}}');" href="#" data-placement="top" data-toggle="tooltip" title="Edit Book"><i class="os-icon os-icon-edit"></i></a><a class="danger" onclick="event.preventDefault();deleteBookForm('{{$book->id}}');" href="#" data-placement="top" data-toggle="tooltip" title="Delete Book"><i class="os-icon os-icon-ui-15"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        <div class="alert alert-info" role="alert">
                            <strong>Sorry! </strong>No Records at the moment.
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
@include('partials.books.books_add')
@include('partials.books.books_edit')
@include('partials.books.books_delete')

<script type="text/javascript">
    window.onload = function() {
        // setToken();
   };
</script>

@endsection


@section('content-panel')
<div class="content-panel" style="display:none;">
    <div class="content-panel-close"><i class="os-icon os-icon-close"></i></div>
    <div class="element-wrapper">
        <h6 class="element-header">Quick Links</h6>
        <div class="element-box-tp">
            <div class="el-buttons-list full-width"><a class="btn btn-white btn-sm" href="#"><i class="os-icon os-icon-delivery-box-2"></i><span>Create New Product</span></a><a class="btn btn-white btn-sm" href="#"><i class="os-icon os-icon-window-content"></i><span>Customer Comments</span></a><a class="btn btn-white btn-sm" href="#"><i class="os-icon os-icon-wallet-loaded"></i><span>Store Settings</span></a></div>
        </div>
    </div>
    <div class="element-wrapper">
        <h6 class="element-header">Support Agents</h6>
        <div class="element-box-tp">
            <div class="profile-tile">
                <a class="profile-tile-box" href="users_profile_small.html">
                    <div class="pt-avatar-w"><img alt="" src="img/avatar1.jpg"></div>
                    <div class="pt-user-name">John Mayers</div>
                </a>
                <div class="profile-tile-meta">
                    <ul>
                        <li>Last Login:<strong>Online Now</strong></li>
                        <li>Tickets:<strong><a href="apps_support_index.html">12</a></strong></li>
                        <li>Response Time:<strong>2 hours</strong></li>
                    </ul>
                    <div class="pt-btn"><a class="btn btn-success btn-sm" href="apps_full_chat.html">Send Message</a></div>
                </div>
            </div>
            <div class="profile-tile">
                <a class="profile-tile-box" href="users_profile_small.html">
                    <div class="pt-avatar-w"><img alt="" src="img/avatar3.jpg"></div>
                    <div class="pt-user-name">Ben Gossman</div>
                </a>
                <div class="profile-tile-meta">
                    <ul>
                        <li>Last Login:<strong>Offline</strong></li>
                        <li>Tickets:<strong><a href="apps_support_index.html">9</a></strong></li>
                        <li>Response Time:<strong>3 hours</strong></li>
                    </ul>
                    <div class="pt-btn"><a class="btn btn-secondary btn-sm" href="apps_full_chat.html">Send Message</a></div>
                </div>
            </div>
        </div>
    </div>
    <div class="element-wrapper">
        <h6 class="element-header">Recent Activity</h6>
        <div class="element-box-tp">
            <div class="activity-boxes-w">
                <div class="activity-box-w">
                    <div class="activity-time">10 Min</div>
                    <div class="activity-box">
                        <div class="activity-avatar"><img alt="" src="img/avatar1.jpg"></div>
                        <div class="activity-info">
                            <div class="activity-role">John Mayers</div><strong class="activity-title">Opened New Account</strong>
                        </div>
                    </div>
                </div>
                <div class="activity-box-w">
                    <div class="activity-time">2 Hours</div>
                    <div class="activity-box">
                        <div class="activity-avatar"><img alt="" src="img/avatar2.jpg"></div>
                        <div class="activity-info">
                            <div class="activity-role">Ben Gossman</div><strong class="activity-title">Posted Comment</strong>
                        </div>
                    </div>
                </div>
                <div class="activity-box-w">
                    <div class="activity-time">5 Hours</div>
                    <div class="activity-box">
                        <div class="activity-avatar"><img alt="" src="img/avatar3.jpg"></div>
                        <div class="activity-info">
                            <div class="activity-role">Phil Nokorin</div><strong class="activity-title">Opened New Account</strong>
                        </div>
                    </div>
                </div>
                <div class="activity-box-w">
                    <div class="activity-time">2 Days</div>
                    <div class="activity-box">
                        <div class="activity-avatar"><img alt="" src="img/avatar4.jpg"></div>
                        <div class="activity-info">
                            <div class="activity-role">Jenny Miksa</div><strong class="activity-title">Uploaded Image</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="element-wrapper">
        <h6 class="element-header">Team Members</h6>
        <div class="element-box-tp">
            <div class="input-search-w">
                <input class="form-control rounded bright" placeholder="Search team members..." type="search">
            </div>
            <div class="users-list-w">
                <div class="user-w with-status status-green">
                    <div class="user-avatar-w">
                        <div class="user-avatar"><img alt="" src="img/avatar1.jpg"></div>
                    </div>
                    <div class="user-name">
                        <h6 class="user-title">John Mayers</h6>
                        <div class="user-role">Account Manager</div>
                    </div>
                    <a class="user-action" href="users_profile_small.html">
                        <div class="os-icon os-icon-email-forward"></div>
                    </a>
                </div>
                <div class="user-w with-status status-green">
                    <div class="user-avatar-w">
                        <div class="user-avatar"><img alt="" src="img/avatar2.jpg"></div>
                    </div>
                    <div class="user-name">
                        <h6 class="user-title">Ben Gossman</h6>
                        <div class="user-role">Administrator</div>
                    </div>
                    <a class="user-action" href="users_profile_small.html">
                        <div class="os-icon os-icon-email-forward"></div>
                    </a>
                </div>
                <div class="user-w with-status status-red">
                    <div class="user-avatar-w">
                        <div class="user-avatar"><img alt="" src="img/avatar3.jpg"></div>
                    </div>
                    <div class="user-name">
                        <h6 class="user-title">Phil Nokorin</h6>
                        <div class="user-role">HR Manger</div>
                    </div>
                    <a class="user-action" href="users_profile_small.html">
                        <div class="os-icon os-icon-email-forward"></div>
                    </a>
                </div>
                <div class="user-w with-status status-green">
                    <div class="user-avatar-w">
                        <div class="user-avatar"><img alt="" src="img/avatar4.jpg"></div>
                    </div>
                    <div class="user-name">
                        <h6 class="user-title">Jenny Miksa</h6>
                        <div class="user-role">Lead Developer</div>
                    </div>
                    <a class="user-action" href="users_profile_small.html">
                        <div class="os-icon os-icon-email-forward"></div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection