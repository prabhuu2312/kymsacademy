@extends('admin.layout.app')

@section('content')
<!-- Font Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    .content-wrapper {
        padding: 30px 50px;
        box-sizing: border-box;
        background: #f5f7fa !important;
    }

    .form-container {
        background: #ffffff;
        border: 1px solid #eaeaea;
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 10px 30px rgba(39, 60, 102, 0.08);
        margin-bottom: 40px;
        width: 100%;
        max-width: 900px;
        margin: 0 auto;
    }

    h2 {
        text-align: center;
        margin-bottom: 25px;
        color: #273C66;
        letter-spacing: 1px;
        font-size: 28px;
        font-weight: 600;
    }

    label {
        display: block;
        margin-bottom: 10px;
        font-weight: 600;
        color: #333333;
    }

    input[type="text"],
    input[type="date"],
    input[type="file"],
    textarea {
        background: #ffffff;
        border: 2px solid #eaeaea;
        border-radius: 8px;
        color: #333333;
        font-size: 16px;
        padding: 12px 15px;
        width: 100%;
        margin-bottom: 20px;
        transition: all 0.3s ease;
        resize: vertical;
        font-family: inherit;
    }

    input[type="text"]:focus,
    input[type="date"]:focus,
    input[type="file"]:focus,
    textarea:focus {
        background: #ffffff;
        border-color: #273C66;
        box-shadow: 0 0 0 3px rgba(39, 60, 102, 0.2);
        outline: none;
    }

    textarea {
        min-height: 200px;
        line-height: 1.6;
    }

    .form-row {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        margin-bottom: 15px;
    }

    .form-group {
        flex: 1 1 calc(50% - 20px);
        min-width: 250px;
    }

    .full-width {
        flex: 1 1 100%;
    }

    .btn-submit {
        background: #273C66;
        border: none;
        border-radius: 8px;
        color: #ffffff;
        font-size: 16px;
        font-weight: 600;
        padding: 15px 30px;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-top: 20px;
        text-align: center;
        display: block;
        width: 200px;
    }

    .btn-submit:hover {
        background: #1a2a4a;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(39, 60, 102, 0.3);
    }

    @media (max-width: 768px) {
        .content-wrapper {
            padding: 20px;
        }

        .form-container {
            padding: 20px;
        }

        .btn-submit {
            width: 100%;
        }

        .form-group {
            flex: 1 1 100%;
        }

        textarea {
            min-height: 150px;
        }
    }
</style>

<div class="content-wrapper">
    <div class="form-container">
        <h2>Add New Blog</h2>

        @if(session('success'))
        <div class="alert alert-success" style="background:#d4edda; color:#155724; padding:15px; border-radius:8px; margin-bottom:20px;">
            {{ session('success') }}
        </div>
        @endif

        @if($errors->any())
        <div class="alert alert-danger" style="background:#f8d7da; color:#721c24; padding:15px; border-radius:8px; margin-bottom:20px;">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="post" action="{{ url('/admin/blogs/store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="form-group">
                    <label>Main Category</label>
                    <input type="text" name="main_category" placeholder="Enter Main Category" required value="{{ old('main_category') }}">
                </div>
                <div class="form-group">
                    <label>Author Name</label>
                    <input type="text" name="author_name" placeholder="Enter Author Name" required value="{{ old('author_name') }}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Publish Date</label>
                    <input type="date" name="publish_date" required value="{{ old('publish_date') }}">
                </div>
                <div class="form-group">
                    <label>Blog Image</label>
                    <input type="file" name="blog_image" accept="image/*" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group full-width">
                    <label>Blog Title</label>
                    <input type="text" name="title" placeholder="Enter Blog Title" required value="{{ old('title') }}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group full-width">
                    <label>Blog Description</label>
                    <textarea name="description" placeholder="Enter detailed blog description..." required>{{ old('description') }}</textarea>
                </div>
            </div>

            <button type="submit" name="submit" class="btn-submit">
                Add Blog <i class="fas fa-arrow-right"></i>
            </button>
        </form>
    </div>
</div>

@endsection