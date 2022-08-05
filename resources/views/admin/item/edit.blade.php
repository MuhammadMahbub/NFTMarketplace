@extends('layouts.dashboard')

{{-- Title --}}
@section('title')
{{ config('app.name') }} | Item
@endsection

{{-- Active Menu --}}
@section('item')
    active
@endsection

{{-- Breadcrumb --}}
@section('breadcrumb')
     <h2 class="content-header-title float-left mb-0">Admin Dashboard</h2>
    <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">Home</a>
            </li>
            <li class="breadcrumb-item">Items</li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
    </div>
@endsection
{{-- Main Content --}}
@section('content')
<div class="row" id="basic-table">
    <div class="col-md-12 col-12 m-auto">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('user_item_update', $item->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <div class="form-group mt-2">
                        <label class="form-label">Name<span class="text-danger"> *</span></label>
                        <input type="text" name="name" class="form-control" value="{{ $item->name ?? 'N/A' }}" >
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mt-2">
                        <label class="form-label">Main Image (Size: 230px*230px)</label>
                        <input type="file" name="image" class="form-control" id="file-upload">
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <img src="" alt="" id="item_output" width="200">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Previous Image</label>
                        <img style="height:100px; width: 100px" src="{{ asset('uploads/items') }}/{{ $item->image ?? 'default.jpg'}}" alt="item Image">
                    </div>
                    <div class="form-group">
                        <label for="description"><b>Description</b> <span class="text-danger">*</span></label>
                        <input id="description" type="hidden" name="description" value="{!! $item->description ?? ''!!}" />
                        <trix-editor input="description" class="trix-content"></trix-editor>
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Category<span class="text-danger">*</span></label>
                        <select name="category_id" class="form-control">
                            <option selected disabled>--Select One--</option>
                            @foreach (nftCategories() as $cat)
                                <option value="{{ $cat->id }}"{{ $cat->id == $item->category_id ? 'selected':''}}>{{ $cat->name ?? 'N/A' }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label class="form-label"> Price<span class="text-danger">*</span></label>
                        <input type="number" name="price" class="form-control" value="{{ $item->price ?? ''}}">
                        @error('price')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label class="form-label">Quantity<span class="text-danger">*</span></label>
                        <input type="number" name="quantity" class="form-control" value="{{ $item->quantity ?? ''}}">
                        @error('quantity')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label class="form-label">Creators Loyalty</label>
                        <input type="number" name="creator_loyalty" class="form-control" value="{{ $item->creator_loyalty ?? '' }}">
                    </div>
                    <div class="form-group mt-2">
                        <label class="form-label">Expire Date</label>
                        <input id="item-date" type="date" name="expire_date" class="form-control" value="{{ $item->expire_date ?? ''}}">
                    </div>
                    <div class="form-group mt-2">
                        <label class="form-label">Buy Button Text</label>
                        <input type="text" name="buy_button_text" class="form-control" value="{{ $item->buy_button_text ?? 'Buy Now' }}">
                        @error('buy_button_text')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label class="form-label">View Button Text</label>
                        <input type="text" name="view_button_text" class="form-control" value="{{ $item->view_button_text ?? 'View Details' }}">
                        @error('view_button_text')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>BlockChain<span class="text-danger">*</span></label>
                        <select name="blockchain" class="form-control">
                            <option {{ $item->blockchain == 'Ethereum' ? 'selected':''}}  value="Ethereum">Ethereum</option>
                            <option {{ $item->blockchain == 'Flow' ? 'selected':''}} value="Flow">Flow</option>
                            <option {{ $item->blockchain == 'FUSD' ? 'selected':''}} value="FUSD">FUSD</option>
                        </select>
                        @error('blockchain')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Button trigger modal -->
                    <div>
                        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#propertyModal">
                            Edit Properties <i class="fa fa-plus"></i>
                        </button>
                    </div>

                    <!-- Modal -->

                    <div class="modal fade" id="propertyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Properties</h5>
                            <small class="text-danger ml-2">(Please put all info if select)</small>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                            @if ($properties->count() > 0)
                            @foreach ($properties as $pro)
                            <div class="row new_properties">
                                <div class="col-4">
                                    <label for="">Name</label>
                                    <input type="text" name="propertyname[]" class="form-control" value="{{ $pro->name }}">
                                </div>
                                <div class="col-4">
                                    <label for="">Type</label>
                                    <input type="text" name="propertytype[]" class="form-control" value="{{ $pro->type }}">
                                </div>
                                <div class="col-3">
                                    <label for="">Trait</label>
                                    <input type="number" name="propertytrait[]" class="form-control" value="{{ $pro->trait }}">
                                </div>
                                <button type="button" class="close remove--new_properties">
                                    <span>&times;</span>
                                </button>
                            </div>
                            @endforeach
                            @else
                            <div class="row new_properties">
                                <div class="col-4">
                                    <label for="">Name</label>
                                    <input type="text" name="propertyname[]" class="form-control" value="{{ old('propertyname') }}">
                                </div>
                                <div class="col-4">
                                    <label for="">Type</label>
                                    <input type="text" name="propertytype[]" class="form-control" value="{{ old('propertytype') }}">
                                </div>
                                <div class="col-3">
                                    <label for="">Trait</label>
                                    <input type="number" name="propertytrait[]" class="form-control" value="{{ old('propertytrait') }}">
                                </div>
                                <button type="button" class="close remove--new_properties">
                                    <span>&times;</span>
                                </button>
                            </div>
                            @endif
                            <div class="properties-container"></div>
                            <div class="btn btn-info mt-1" id="add_more">Add More</div>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="save_property">Save Properties</button>
                            </div>
                        </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-1">Update</button>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection


@section('js')
<script>
    document.getElementById('file-upload').onchange = function() {
        var src = URL.createObjectURL(this.files[0])
        document.getElementById('item_output').src = src
    }
  </script>

  <script>
      $(document).ready(function () {
      var today = new Date().toISOString().split('T')[0];
      $("#item-date").attr('min', today);
  });
  </script>

<script>
    $(document).ready(function () {
        $('#add_more').click(function (){
            // alert('hi');
            let new_properties_html =
            `<div class="row new_properties">
                <div class="col-4">
                    <label for="">Name</label>
                    <input type="text" name="propertyname[]" class="form-control">
                </div>
                <div class="col-4">
                    <label for="">Type</label>
                    <input type="text" name="propertytype[]" class="form-control">
                </div>
                <div class="col-3">
                    <label for="">Trait</label>
                    <input type="number" name="propertytrait[]" class="form-control">
                </div>
                <button type="button" class="close remove--new_properties">
                    <span>&times;</span>
                </button>
            </div>`;

            $('.properties-container').append(new_properties_html);
        });

        $(document).on('click', '.remove--new_properties', function(){
            $(this).closest(".new_properties").remove();
        });

        $('body').on('click', '#save_property', function(){
            $('#propertyModal').modal('hide');
        })

    });
</script>
@endsection
