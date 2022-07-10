<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h6 class="card-header text-primary">Write a Review</h6>
             <form method="post" action="{{route('review.post')}}" name="ratingForm" id="ratingForm">
                 @csrf
                 <input type="hidden" name="product_id" value="{{$products->id}}">
                 <div class="rate">
                     <input type="radio" id="star5" name="rating" value="5" />
                     <label for="star5" title="text">5 stars</label>
                     <input type="radio" id="star4" name="rating" value="4" />
                     <label for="star4" title="text">4 stars</label>
                     <input type="radio" id="star3" name="rating" value="3" />
                     <label for="star3" title="text">3 stars</label>
                     <input type="radio" id="star2" name="rating" value="2" />
                     <label for="star2" title="text">2 stars</label>
                     <input type="radio" id="star1" name="rating" value="1" />
                     <label for="star1" title="text">1 star</label>
                 </div><br><br>
                 <div class="form-group">
                     <label class="text-primary">{{ucfirst(Auth::user()->name)}}</label><br>
                     <textarea name="review" style="width:300px; height: 50px" required></textarea>
                 </div>
                     <button type="submit" class="btn btn-success btn-sm" >Submit</button>
             </form>
        </div>
    </div><br><br>
    <div class="row">
        <div class="col-md-12">
            <h6 class="card-header text-primary">Users Review</h6>
                @foreach($reviews as $row)
                <div>
                    <?php
                      $count = 1;
                      while($count<=$row['rating']){ ?>
                      <span>&#9733</span>
                    <?php $count++;}?>
                    <p class="text-danger">{{ucfirst($row->user->name)}}</p>
                    <p>{{$row->review}}</p>
                    <p>{{\Carbon\Carbon::parse($row['created_at'])->diffForHumans() }}</p><br><hr>
                </div>
                @endforeach

        </div>
    </div>
</div>
