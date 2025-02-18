@extends('layout.master')

@section('my-body')
<div class="container text-center mt-5">
    <h1 class="mb-3">Welcome to Our Website</h1>
    <p class="lead">Discover amazing content and explore new opportunities.</p>

    <!-- Featured Sections -->
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h3 class="card-title">Latest News</h3>
                    <p class="card-text">Stay updated with the latest trends and insights.</p>
                    <a href="#" class="btn btn-primary">Read More</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h3 class="card-title">Our Services</h3>
                    <p class="card-text">We provide top-notch services tailored for your needs.</p>
                    <a href="#" class="btn btn-success">Learn More</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h3 class="card-title">Contact Us</h3>
                    <p class="card-text">Have any questions? Reach out to our team anytime.</p>
                    <a href="#" class="btn btn-warning">Get in Touch</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action -->
    <div class="mt-5 p-4 bg-primary text-white rounded">
        <h2>Join Our Community</h2>
        <p>Sign up today and be a part of something great.</p>
        <a href="/auth/register" class="btn btn-light btn-lg">Sign Up</a>
    </div>
</div>
@endsection
