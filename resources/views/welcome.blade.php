@extends('layouts.welcome')

@section('content')
<div class="card-group mt-4">
    <div class="card">
        <img src="/assets/img/welc_1.webp" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Categorize your products</h5>
          <p class="card-text">Distinctly place your products into categories using this website.</p>
        </div>
      </div>
    <div class="card">
        <img src="/assets/img/welc_2.png" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Create and delete the categories</h5>
          <p class="card-text">Find basic CRUD applications with this webpage that allows you to create, update and delete products and categories.</p>
        </div>
      </div>
    <div class="card">
      <img src="/assets/img/welc_3.webp" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Classify your items</h5>
        <p class="card-text">Products have been clasified in accordance to their categories in here.</p>
      </div>
    </div>
  </div>
@endsection
