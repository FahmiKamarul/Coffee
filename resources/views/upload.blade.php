@extends('layouts.layout')

@section('content')
@php
    $prod = $products->get(1); 
@endphp
<div class="container">
    <h2>Add New Product</h2>
    <form method="POST" action="/upload" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div>
            <div class="photo">
                
                <div class="photoPreview">
                    <img id="imagePreview" src="/img/8230211-removebg-preview.png" alt="Image Preview" style=" width: 100px;  height:100px;margin:auto;">
                </div>
                <div >
                    <input type="file" id="image" name="image" accept="image/*" required onchange="previewImage(event)">
                    <label for="image" ><i class="solid">Change Picture</i> </label>
                </div>
            

            </div>
            <div>
                <div>
                    <label for="name">Product Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>

                
                
                <div>
                    <label for="category">Category:</label>
                    <select id="category" name="category" required>
                        <option value="latte">Latte</option>
                        <option value="coffee">Coffee</option>
                    </select>
                </div>

                <div>
                    <label for="price">Price:</label>
                    <input type="text" id="price" name="price" required>
                </div>

                <fieldset>
                    <legend style="margin:auto;padding-top:10px">Dairy Free?</legend>
                    <label><input type="radio" name="dairyFree" value="YES" required> Yes</label>
                    <label><input type="radio" name="dairyFree" value="NO"> No</label>
                </fieldset>

                <fieldset>
                    <legend style="margin:auto;padding-top:10px">Active?</legend>
                    <label><input type="radio" name="active" value="YES" required> Yes</label>
                    <label><input type="radio" name="active" value="NO"> No</label>
                </fieldset>
            
            
                <div>
                    <label for="description">Description:</label>
                    <textarea name="description" id="description"></textarea>
                </div>
            </div>
        </div>
        
        <input type="submit"  value="Add">
        
    </form>
    
    <script>
        function previewImage(event) {
            const imagePreview = document.getElementById('imagePreview');
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
<div class="container"style="padding-top:0px;">
    <div class="header"style="padding-top:10px;">
        <h2 style="margin:10px;">All Product</h2>
        <div style="display:flex;">
            <div >
                <input type="text" id="namesearch" name="namesearch" required placeholder="search" style="width:330px;padding:6.5px;">
            </div>
            <div >
                <label for="beverage" style="padding-left:10px;">Type:</label >
                <select id="beverage" name="beverage" style="width:100px;">
                    <option value="all">All</option>
                    <option value="latte">Latte</option>
                    <option value="coffee">Coffee</option>
                </select>

            </div>
        </div>
        <div style="display:flex;text-align:center;margin:10px;">
            <div style="width:35px;margin:auto;"></div>
            <div style="width:auto;margin:auto;">Name</div>
            <div style="width:auto;margin:auto;">price</div>
            <div style="width:auto;margin:auto;">Status</div>
            <div style="width:45px;margin:auto;"></div>
            
        </div>
        <div style="background-color:grey; width:auto; height: 2px;"></div>
    </div>
    
    <div id="productList">
        @foreach($products as $product)
            <div class="listAll"data-category="{{ $product->productCategory }}" data-name="{{ $product->productName }}" style="display: flex; align-items: center; padding: 10px;">
                <img class="allproduct" src="{{ asset('storage/coffeList/' . $product->productImage) }}" alt="Product Image">
                <div>{{ $product->productName }}</div>
                <div>RM{{ number_format($product->productPrice, 2) }}</div>
                <div>
                    <div class="status-ball {{ $product->productActive ? 'active' : 'inactive' }}" style="display:inline-block"></div>
                    <span style="width:20px display:inline-block; ">{{ $product->productActive ? 'YES' : 'NO' }}</span> 
                </div>
                <div><a href="/upload/{{$product->productID}}" style="text-decoration:none;"><div class="managebutton" >manage</div></a></div>
            </div>
        @endforeach
    </div>
    @yield("product")
    
    

</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const selectElement = document.getElementById('beverage');
        const selectName = document.getElementById('namesearch');
        const productList = document.getElementById('productList');
        const products = productList.getElementsByClassName('listAll');
        const modal = document.getElementById('popupModal');
        const closeModal = document.getElementsByClassName('close')[0];

        function filterProducts() {
            const selectedCategory = selectElement.value;
            const selectedName = selectName.value.toLowerCase();
            for (let product of products) {
                const productCategory = product.getAttribute('data-category');
                const productName = product.getAttribute('data-name').toLowerCase();
                const nameMatch = productName.includes(selectedName);
                if ((selectedCategory === 'all' || productCategory === selectedCategory) && nameMatch) {
                    product.style.display = 'flex';
                } else {
                    product.style.display = 'none';
                }
            }
        }

        selectName.addEventListener('keyup', filterProducts);
        selectElement.addEventListener('change', filterProducts);
    });
</script>

@endsection