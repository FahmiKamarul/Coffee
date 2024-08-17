@extends('upload')

@section('product')
<div id="popupModal" class="modal">
    <div class="modal-content container">
        <a href="/upload"><span class="close">&times;</span></a>
        <h2>Manage Product</h2>
        <form method="POST" action="/upload/{{$prod->productID}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            @method('PATCH')
            <div>
                <div class="photo">
                    
                    <div class="photoPreview">
                        <img id="imagePreviewManage" src="{{ asset('storage/coffeList/' . $prod->productImage) }}" alt="Image Preview" style=" max-width: 100px; max-height:100px;margin:auto;">
                    </div>
                    <div >
                        <input type="file" id="imageManage" name="imageManage" accept="image/*"  onchange="previewImage(event)">
                        <label for="imageManage" ><i class="solid">Change Picture</i> </label>
                    </div>
                

                </div>
                <div>
                    <div>
                        <label for="nameManage">Coffee Name:</label>
                        <input type="text" id="nameManage" name="nameManage" required value="{{$prod->productName}}">
                    </div>

                    
                    
                    <div>
                        <label for="categoryManage">Category:</label>
                        <select id="categoryManage" name="categoryManage" required>
                            <option value="drink" {{$prod->productCategory == 'drink' ? 'selected' : ''}}>Drink</option>
                            <option value="dessert" {{$prod->productCategory == 'dessert' ? 'selected' : ''}}>Dessert</option>
                        </select>
                    </div>


                    <div>
                        <label for="priceManage">Price:</label>
                        <input type="text" id="priceManage" name="priceManage" required value="{{$prod->productPrice}}">
                    </div>

                    <fieldset>
                        <legend style="margin:auto;padding-top:10px">Dairy Free?</legend>
                        <label><input type="radio"{{$prod->productDairyFree ==1? 'checked' : ''}} name="dairyFreeManage" value="YES" required> Yes</label>
                        <label><input type="radio"{{$prod->productDairyFree ==0? 'checked' : ''}} name="dairyFreeManage" value="NO"> No</label>
                    </fieldset>

                    <fieldset>
                        <legend style="margin:auto;padding-top:10px">Active?</legend>
                        <label><input type="radio"{{$prod->productActive ==1? 'checked' : ''}} name="activeManage" value="YES" required> Yes</label>
                        <label><input type="radio"{{$prod->productActive ==0? 'checked' : ''}} name="activeManage" value="NO"> No</label>
                    </fieldset>
                
                
                    <div>
                        <label for="descriptionManage">Description:</label>
                        <textarea name="descriptionManage" id="descriptionManage">{{$prod->productDescription}}</textarea>
                    </div>
                </div>
            </div>
            
            <input type="submit"  value="Update">
            
        </form>
        <script>
        function previewImage(event) {
            const imagePreview = document.getElementById('imagePreviewManage');
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = 'block'; 
                };

                reader.readAsDataURL(file); 
            } else {
                imagePreview.src='/img/8230211-removebg-preview.png';
                imagePreview.style.display = 'block'; 
            }
        }
    </script>
    </div>
    
</div>

@endsection