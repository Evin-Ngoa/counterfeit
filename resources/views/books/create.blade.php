@extends('layout.app')

@section('title', 'Books | Form')

@section('content-box')
<div class="content-box">
    <div class="row pt-4">
        <div class="col-sm-8 col-lg-8">
            <div class="element-wrapper">
                <div class="element-actions">
                    <a class="btn btn-success btn-sm" href="{{ route('book.index') }}">
                        <i class="os-icon os-icon-book"></i><span>My Books Records</span>
                    </a>
                    <!-- <a class="btn btn-primary btn-sm" href="#">
                        <i class="os-icon os-icon-grid-10"></i><span>Make Payment</span>
                    </a> -->
                </div>
                <h6 class="element-header">Add Book Form</h6>
                <div class="element-box">
                    <form>
                        <h5 class="form-header">Horizontal Layout</h5>
                        <div class="form-desc">Discharge best employed your phase each the of shine. Be met even reason consider logbook redesigns. Never a turned interfaces among asking</div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-4" for=""> Your Email</label>
                            <div class="col-sm-8">
                                <input class="form-control" placeholder="Enter email" type="email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-4" for=""> Password</label>
                            <div class="col-sm-8">
                                <input class="form-control" placeholder="Password" type="password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-4" for="">Password Again</label>
                            <div class="col-sm-8">
                                <input class="form-control" placeholder="Password" type="password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-4" for=""> Regular select</label>
                            <div class="col-sm-8">
                                <select class="form-control">
                                    <option>Select State</option>
                                    <option>New York</option>
                                    <option>California</option>
                                    <option>Boston</option>
                                    <option>Texas</option>
                                    <option>Colorado</option>
                                </select>
                            </div>
                        </div>
                        
                        <fieldset class="form-group">
                            <legend><span>Section Example</span></legend>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for=""> First Name</label>
                                <div class="col-sm-8">
                                    <input class="form-control" placeholder="First Name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for=""> Last Name</label>
                                <div class="col-sm-8">
                                    <input class="form-control" placeholder="Last Name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for="">Username</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">@</div>
                                        </div>
                                        <input class="form-control" placeholder="Twitter Username">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label" for=""> Date Picker</label>
                                <div class="col-sm-8">
                                    <div class="date-input">
                                        <input class="single-daterange form-control" placeholder="Date of birth" value="04/12/1978">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Example textarea</label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" rows="3"></textarea>
                                </div>
                            </div>
                        </fieldset>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Radio Buttons</label>
                            <div class="col-sm-8">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input checked="" class="form-check-input" name="optionsRadios" type="radio" value="option1">Option number one</label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="optionsRadios" type="radio" value="option2">Here is another radio option</label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="optionsRadios" type="radio" value="option3">Option three is here</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-buttons-w">
                            <button class="btn btn-primary" type="submit"> Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content-panel')

@endsection