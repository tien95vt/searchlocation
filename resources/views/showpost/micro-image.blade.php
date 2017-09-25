<div class="col-xs-12 col-sm-12 col-md-12">
  <div class="carousel carousel-showmanymoveone slide" id="itemslider">
    <div class="carousel-inner">
    @foreach($picturePost as $key => $valuePicturePost)
      <div class="item{{ $key == 0 ? ' active' : '' }}">
        <div id="slide-image" class="col-xs-12 col-sm-6 col-md-2">
          <a href="#"><img src="{{asset('upload/picture/post/').'/'.$valuePicturePost->reference_piture}}" class=" center-block" width="125px" height="125px"></a>
          {{-- <h4 class="text-center">{{$valuePicturePost->id}}</h4> --}}
          {{-- <h5 class="text-center">4000 RSD</h5> --}}
        </div>
      </div>
    @endforeach
    </div>

    <div id="slider-control">
    <!-- <a class="left carousel-control" href="#itemslider" data-slide="prev"><img src="https://s12.postimg.org/uj3ffq90d/arrow_left.png" alt="Left" class="img-responsive"></a> -->
    <!-- <a class="right carousel-control" href="#itemslider" data-slide="next"><img src="https://s12.postimg.org/djuh0gxst/arrow_right.png" alt="Right" class="img-responsive"></a> -->
  </div>
  </div>
</div>