<div class="element-wrapper">
    <h6 class="element-header">Buy Book</h6>
    <div class="element-box">
        <form id="frmBuyBook">
            <!-- <div class="alert alert-warning">
                Report a book that is rendered possible counterfeit and get points. However false alarm in order to get
                points can lead to permanent disqualification of earning points or penalty deductions depending on the
                frequency of false alarm.
            </div> -->
            <div id="add-buy-book-msgs"></div>

            <div class="alert alert-danger" id="add-error-buy-book-bag" style="display: none;">
                <ul id="add-buy-book-errors">
                </ul>
            </div>

            @if(!$bookSold)
                <div class="form-group">
                    <label for="book"> Book ID</label>
                    <!-- <input class="form-control" placeholder="Enter Book ID" type="text" name="book_show" id="book_show" value="{{ $id }}" disabled> -->
                    <input class="form-control" placeholder="Enter Book ID" type="text" name="book" id="book" value="{{ $id }}">
                </div>

                <div class="form-group">
                    <label for="store">Purchase From [BookShop ID]</label>
                    <input class="form-control" type="text" name="purchasedToMemberId" id="purchasedToMemberId" value="{{$reportedToMemberId}}" >
                    <input class="form-control" type="hidden" name="purchasedTo" id="purchasedTo" value="{{$purchasedToEmail}}">
                    <input class="form-control" type="hidden" name="purchasedToPoints" id="purchasedToPoints" value="{{$purchasedToPoints}}">
                    <input class="form-control" type="hidden" name="purchasedBy" id="purchasedBy" value="{{\App\User::loggedInUserEmail()}}">
                    <input class="form-control" type="hidden" name="bookPoints" id="bookPoints" value="{{$book->maxPoints}}">
                    <input class="form-control" type="hidden" name="indCustomerPoints" id="indCustomerPoints" value="{{$user->accountBalance}}">
                </div>
                <div class="form-group">
                    <div id="pointsMsg">
                        
                    </div>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        {{-- $book->shipment->contract->pricePoints --}}
                        {{-- $book->pricePoints --}}
                        {{-- $book->price --}}
                        <?php 
                            $discount = $book->maxPoints / 10;
                            $newPrice = $book->price - $discount;
                        ?>
                        <input class="form-control" type="hidden" name="newPrice" id="newPrice" value="{{$newPrice}}">
                        <input type="checkbox" class="form-check-input" name="usedPoints" id="usedPoints" value="1"> Redeem {{ $book->maxPoints }} Points and Pay {{ $newPrice }} instead of {{ $book->price }}.
                    </label>
                </div>

                <div class="form-buttons-w">
                    <button class="btn btn-primary btn-buy-book" type="button"> Purchase Book</button>
                </div>
            @else
                <div class="alert alert-danger">
                    Book {{ $id }} already sold.
                </div>
            @endif
        </form>
    </div>
</div>