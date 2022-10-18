<div class="col-md-12 my-4">
    <h3>Available space: <span class="badge bg-success">{{$parkings->where('availability',1)->count() + $parkingSeconds->where('availability',1)->count()}}</span>
    </h3>
</div>
<div class="col-md-12 mb-4 border-bottom">
    <h5>Parking space 1</h5>
</div>
@forelse($parkings as $parking)
    <div class="col-md-3 card {{$parking->availability == 1 ? 'border-success': ($parking->availability == 2 ? 'border-info' :'border-danger')}} mx-md-2 mb-3">
        <div class="card-body">
            <h5 class="card-title">Slot {{$loop->iteration}}:
                @if($parking->availability == 1)
                    <span class="badge bg-success">Available</span>
                @elseif($parking->availability == 2)
                    <span class="badge bg-info">Booked</span>
                @else
                    <span class="badge bg-danger">Unavailable</span>
                @endif
            </h5>
            <p>
                <i class="fas fa-car {{$parking->availability != 1 ? 'text-black': 'text-white'}}" style="font-size: 4em"></i></p>
            @if(!is_null($user) && $user->parking_lot_id == $parking->id)
                @if($door->state == 0)
                <form action="{{route('booking.door',1)}}" method="post" class="mb-3">
                    @csrf
                    <button href="#" class="btn btn-primary text-light rounded-0 w-100">Open Gate</button>
                </form>
                @else
                    <div class="alert alert-primary d-flex align-items-center" role="alert">
                        <i class="fas fa-info-circle me-2" style="font-size: 1.5em"></i>
                        <div>
                            Press the button at the gate
                        </div>
                    </div>
                @endif
            @endif
            @if($parking->availability == 1)
                <form action="{{route('booking.store',$parking->id)}}" method="post">
                    @csrf
                    <button href="#" class="btn btn-success rounded-0 w-100">Book</button>
                </form>

                @elseif($parking->availability == 2 && !is_null($user) && $user->parking_lot_id == $parking->id )
                <form action="{{route('booking.delete',$parking->id)}}" method="post">
                    @method('DELETE')
                    @csrf
                    <button href="#" class="btn btn-danger text-light rounded-0 w-100">Cancel</button>
                </form>
            @endif
        </div>
    </div>
@empty
    <div class="col-md-12">
        <p class="display-6 text-center">There is no parking space yet :(</p>
    </div>
@endforelse
<div class="col-md-12 mt-5 mb-4 border-bottom">
    <h5>Parking space 2</h5>
</div>
@forelse($parkingSeconds as $parking)
    <div class="col-md-3 card {{$parking->availability == 1 ? 'border-success': ($parking->availability == 2 ? 'border-info' :'border-danger')}} mx-md-2 mb-3">
        <div class="card-body">
            <h5 class="card-title">Slot {{$loop->iteration}}:
                @if($parking->availability == 1)
                    <span class="badge bg-success">Available</span>
                @elseif($parking->availability == 2)
                    <span class="badge bg-info">Booked</span>
                @else
                    <span class="badge bg-danger">Unavailable</span>
                @endif
            </h5>
            <p>
                <i class="fas fa-car {{$parking->availability != 1 ? 'text-black': 'text-white'}}" style="font-size: 4em"></i></p>
            @if(!is_null($user) && $user->parking_lot_id == $parking->id)
                @if($door->state == 0)
                    <form action="{{route('booking.door',1)}}" method="post" class="mb-3">
                        @csrf
                        <button href="#" class="btn btn-primary text-light rounded-0 w-100">Open Gate</button>
                    </form>
                @else
                    <div class="alert alert-primary d-flex align-items-center" role="alert">
                        <i class="fas fa-info-circle me-2" style="font-size: 1.5em"></i>
                        <div>
                            Press the button at the gate
                        </div>
                    </div>
                @endif
            @endif
            @if($parking->availability == 1)
                <form action="{{route('booking.store',$parking->id)}}" method="post">
                    @csrf
                    <button href="#" class="btn btn-success rounded-0 w-100">Book</button>
                </form>

            @elseif($parking->availability == 2 && !is_null($user) && $user->parking_lot_id == $parking->id )
                    <form action="{{route('booking.delete',$parking->id)}}" method="post">
                        @method('DELETE')
                        @csrf
                        <button href="#" class="btn btn-danger text-light rounded-0 w-100">Cancel</button>
                    </form>
            @endif
        </div>
    </div>
@empty
    <div class="col-md-12">
        <p class="display-6 text-center">There is no parking space yet :(</p>
    </div>
@endforelse
