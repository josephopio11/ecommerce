@extends('layouts.admin.app')

@section('content')
    <div class="page-header">
        @if (session()->has('message'))
            <div class="alert alert-success myAlert">
                {{ session()->get('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
            </div>
        @endif
        <h3 class="page-title"> Products </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Products</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Product</h4>
                    <form class="form-sample" method="POST" action="{{ route('product.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Title</label>
                                    <div class="col-sm-9">
                                        <input name="title" type="text" class="form-control" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Category</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="category">
                                            <option value="">Select Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Image</label>
                                    <div class="col-sm-9">
                                        <input name="image" type="file" class="" required />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Quantity</label>
                                    <div class="col-sm-9">
                                        <input name="quantity" type="number" class="form-control" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Price</label>
                                    <div class="col-sm-9">
                                        <input name="price" type="number" class="form-control" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Discounted Price</label>
                                    <div class="col-sm-9">
                                        <input name="discount_price" type="number" class="form-control" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-12 col-form-label">Description</label>
                                    <div class="col-sm-12">

                                        <textarea id="tinyMceExample" {{-- style="display:none;" --}} name='description' aria-hidden="true" data-gramm="false" wt-ignore-input="true" class="form-control" rows="5">

                                        </textarea>
                                        {{-- <div role="application" class="tox tox-tinymce" aria-disabled="false"
                                            style="visibility: hidden; height: 500px;">
                                            <div class="tox-editor-container">
                                                <div data-alloy-vertical-dir="toptobottom" class="tox-editor-header">
                                                    <div role="menubar" data-alloy-tabstop="true" class="tox-menubar">
                                                        <button aria-haspopup="true" role="menuitem" type="button"
                                                            tabindex="-1" data-alloy-tabstop="true" unselectable="on"
                                                            class="tox-mbtn tox-mbtn--select" aria-expanded="false"
                                                            style="user-select: none;"><span
                                                                class="tox-mbtn__select-label">File</span>
                                                            <div class="tox-mbtn__select-chevron"><svg width="10"
                                                                    height="10" focusable="false">
                                                                    <path
                                                                        d="M8.7 2.2c.3-.3.8-.3 1 0 .4.4.4.9 0 1.2L5.7 7.8c-.3.3-.9.3-1.2 0L.2 3.4a.8.8 0 010-1.2c.3-.3.8-.3 1.1 0L5 6l3.7-3.8z"
                                                                        fill-rule="nonzero"></path>
                                                                </svg></div>
                                                        </button><button aria-haspopup="true" role="menuitem"
                                                            type="button" tabindex="-1" data-alloy-tabstop="true"
                                                            unselectable="on" class="tox-mbtn tox-mbtn--select"
                                                            aria-expanded="false" style="user-select: none;"><span
                                                                class="tox-mbtn__select-label">Edit</span>
                                                            <div class="tox-mbtn__select-chevron"><svg width="10"
                                                                    height="10" focusable="false">
                                                                    <path
                                                                        d="M8.7 2.2c.3-.3.8-.3 1 0 .4.4.4.9 0 1.2L5.7 7.8c-.3.3-.9.3-1.2 0L.2 3.4a.8.8 0 010-1.2c.3-.3.8-.3 1.1 0L5 6l3.7-3.8z"
                                                                        fill-rule="nonzero"></path>
                                                                </svg></div>
                                                        </button><button aria-haspopup="true" role="menuitem"
                                                            type="button" tabindex="-1" data-alloy-tabstop="true"
                                                            unselectable="on" class="tox-mbtn tox-mbtn--select"
                                                            aria-expanded="false" style="user-select: none;"><span
                                                                class="tox-mbtn__select-label">View</span>
                                                            <div class="tox-mbtn__select-chevron"><svg width="10"
                                                                    height="10" focusable="false">
                                                                    <path
                                                                        d="M8.7 2.2c.3-.3.8-.3 1 0 .4.4.4.9 0 1.2L5.7 7.8c-.3.3-.9.3-1.2 0L.2 3.4a.8.8 0 010-1.2c.3-.3.8-.3 1.1 0L5 6l3.7-3.8z"
                                                                        fill-rule="nonzero"></path>
                                                                </svg></div>
                                                        </button><button aria-haspopup="true" role="menuitem"
                                                            type="button" tabindex="-1" data-alloy-tabstop="true"
                                                            unselectable="on" class="tox-mbtn tox-mbtn--select"
                                                            aria-expanded="false" style="user-select: none;"><span
                                                                class="tox-mbtn__select-label">Insert</span>
                                                            <div class="tox-mbtn__select-chevron"><svg width="10"
                                                                    height="10" focusable="false">
                                                                    <path
                                                                        d="M8.7 2.2c.3-.3.8-.3 1 0 .4.4.4.9 0 1.2L5.7 7.8c-.3.3-.9.3-1.2 0L.2 3.4a.8.8 0 010-1.2c.3-.3.8-.3 1.1 0L5 6l3.7-3.8z"
                                                                        fill-rule="nonzero"></path>
                                                                </svg></div>
                                                        </button><button aria-haspopup="true" role="menuitem"
                                                            type="button" tabindex="-1" data-alloy-tabstop="true"
                                                            unselectable="on" class="tox-mbtn tox-mbtn--select"
                                                            aria-expanded="false" style="user-select: none;"><span
                                                                class="tox-mbtn__select-label">Format</span>
                                                            <div class="tox-mbtn__select-chevron"><svg width="10"
                                                                    height="10" focusable="false">
                                                                    <path
                                                                        d="M8.7 2.2c.3-.3.8-.3 1 0 .4.4.4.9 0 1.2L5.7 7.8c-.3.3-.9.3-1.2 0L.2 3.4a.8.8 0 010-1.2c.3-.3.8-.3 1.1 0L5 6l3.7-3.8z"
                                                                        fill-rule="nonzero"></path>
                                                                </svg></div>
                                                        </button><button aria-haspopup="true" role="menuitem"
                                                            type="button" tabindex="-1" data-alloy-tabstop="true"
                                                            unselectable="on" class="tox-mbtn tox-mbtn--select"
                                                            aria-expanded="false" style="user-select: none;"><span
                                                                class="tox-mbtn__select-label">Tools</span>
                                                            <div class="tox-mbtn__select-chevron"><svg width="10"
                                                                    height="10" focusable="false">
                                                                    <path
                                                                        d="M8.7 2.2c.3-.3.8-.3 1 0 .4.4.4.9 0 1.2L5.7 7.8c-.3.3-.9.3-1.2 0L.2 3.4a.8.8 0 010-1.2c.3-.3.8-.3 1.1 0L5 6l3.7-3.8z"
                                                                        fill-rule="nonzero"></path>
                                                                </svg></div>
                                                        </button><button aria-haspopup="true" role="menuitem"
                                                            type="button" tabindex="-1" data-alloy-tabstop="true"
                                                            unselectable="on" class="tox-mbtn tox-mbtn--select"
                                                            aria-expanded="false" style="user-select: none;"><span
                                                                class="tox-mbtn__select-label">Table</span>
                                                            <div class="tox-mbtn__select-chevron"><svg width="10"
                                                                    height="10" focusable="false">
                                                                    <path
                                                                        d="M8.7 2.2c.3-.3.8-.3 1 0 .4.4.4.9 0 1.2L5.7 7.8c-.3.3-.9.3-1.2 0L.2 3.4a.8.8 0 010-1.2c.3-.3.8-.3 1.1 0L5 6l3.7-3.8z"
                                                                        fill-rule="nonzero"></path>
                                                                </svg></div>
                                                        </button><button aria-haspopup="true" role="menuitem"
                                                            type="button" tabindex="-1" data-alloy-tabstop="true"
                                                            unselectable="on" class="tox-mbtn tox-mbtn--select"
                                                            aria-expanded="false" style="user-select: none;"><span
                                                                class="tox-mbtn__select-label">Help</span>
                                                            <div class="tox-mbtn__select-chevron"><svg width="10"
                                                                    height="10" focusable="false">
                                                                    <path
                                                                        d="M8.7 2.2c.3-.3.8-.3 1 0 .4.4.4.9 0 1.2L5.7 7.8c-.3.3-.9.3-1.2 0L.2 3.4a.8.8 0 010-1.2c.3-.3.8-.3 1.1 0L5 6l3.7-3.8z"
                                                                        fill-rule="nonzero"></path>
                                                                </svg></div>
                                                        </button>
                                                    </div>
                                                    <div class="tox-toolbar-overlord">
                                                        <div role="group" class="tox-toolbar" aria-disabled="false">
                                                            <div title="" role="toolbar" data-alloy-tabstop="true"
                                                                tabindex="-1" class="tox-toolbar__group"><button
                                                                    aria-label="Undo" title="Undo" type="button"
                                                                    tabindex="-1" class="tox-tbtn"
                                                                    aria-disabled="false"><span
                                                                        class="tox-icon tox-tbtn__icon-wrap"><svg
                                                                            width="24" height="24"
                                                                            focusable="false">
                                                                            <path
                                                                                d="M6.4 8H12c3.7 0 6.2 2 6.8 5.1.6 2.7-.4 5.6-2.3 6.8a1 1 0 01-1-1.8c1.1-.6 1.8-2.7 1.4-4.6-.5-2.1-2.1-3.5-4.9-3.5H6.4l3.3 3.3a1 1 0 11-1.4 1.4l-5-5a1 1 0 010-1.4l5-5a1 1 0 011.4 1.4L6.4 8z"
                                                                                fill-rule="nonzero"></path>
                                                                        </svg></span></button><button aria-label="Redo"
                                                                    title="Redo" type="button" tabindex="-1"
                                                                    class="tox-tbtn tox-tbtn--disabled"
                                                                    aria-disabled="true"><span
                                                                        class="tox-icon tox-tbtn__icon-wrap"><svg
                                                                            width="24" height="24"
                                                                            focusable="false">
                                                                            <path
                                                                                d="M17.6 10H12c-2.8 0-4.4 1.4-4.9 3.5-.4 2 .3 4 1.4 4.6a1 1 0 11-1 1.8c-2-1.2-2.9-4.1-2.3-6.8.6-3 3-5.1 6.8-5.1h5.6l-3.3-3.3a1 1 0 111.4-1.4l5 5a1 1 0 010 1.4l-5 5a1 1 0 01-1.4-1.4l3.3-3.3z"
                                                                                fill-rule="nonzero"></path>
                                                                        </svg></span></button></div>
                                                            <div title="" role="toolbar" data-alloy-tabstop="true"
                                                                tabindex="-1" class="tox-toolbar__group"><button
                                                                    title="Formats" aria-label="Formats"
                                                                    aria-haspopup="true" type="button" tabindex="-1"
                                                                    unselectable="on"
                                                                    class="tox-tbtn tox-tbtn--select tox-tbtn--bespoke"
                                                                    aria-expanded="false" style="user-select: none;"><span
                                                                        class="tox-tbtn__select-label">Paragraph</span>
                                                                    <div class="tox-tbtn__select-chevron"><svg
                                                                            width="10" height="10"
                                                                            focusable="false">
                                                                            <path
                                                                                d="M8.7 2.2c.3-.3.8-.3 1 0 .4.4.4.9 0 1.2L5.7 7.8c-.3.3-.9.3-1.2 0L.2 3.4a.8.8 0 010-1.2c.3-.3.8-.3 1.1 0L5 6l3.7-3.8z"
                                                                                fill-rule="nonzero"></path>
                                                                        </svg></div>
                                                                </button></div>
                                                            <div title="" role="toolbar" data-alloy-tabstop="true"
                                                                tabindex="-1" class="tox-toolbar__group"><button
                                                                    aria-label="Bold" title="Bold" type="button"
                                                                    tabindex="-1" class="tox-tbtn" aria-disabled="false"
                                                                    aria-pressed="false"><span
                                                                        class="tox-icon tox-tbtn__icon-wrap"><svg
                                                                            width="24" height="24"
                                                                            focusable="false">
                                                                            <path
                                                                                d="M7.8 19c-.3 0-.5 0-.6-.2l-.2-.5V5.7c0-.2 0-.4.2-.5l.6-.2h5c1.5 0 2.7.3 3.5 1 .7.6 1.1 1.4 1.1 2.5a3 3 0 01-.6 1.9c-.4.6-1 1-1.6 1.2.4.1.9.3 1.3.6s.8.7 1 1.2c.4.4.5 1 .5 1.6 0 1.3-.4 2.3-1.3 3-.8.7-2.1 1-3.8 1H7.8zm5-8.3c.6 0 1.2-.1 1.6-.5.4-.3.6-.7.6-1.3 0-1.1-.8-1.7-2.3-1.7H9.3v3.5h3.4zm.5 6c.7 0 1.3-.1 1.7-.4.4-.4.6-.9.6-1.5s-.2-1-.7-1.4c-.4-.3-1-.4-2-.4H9.4v3.8h4z"
                                                                                fill-rule="evenodd"></path>
                                                                        </svg></span></button><button aria-label="Italic"
                                                                    title="Italic" type="button" tabindex="-1"
                                                                    class="tox-tbtn" aria-disabled="false"
                                                                    aria-pressed="false"><span
                                                                        class="tox-icon tox-tbtn__icon-wrap"><svg
                                                                            width="24" height="24"
                                                                            focusable="false">
                                                                            <path
                                                                                d="M16.7 4.7l-.1.9h-.3c-.6 0-1 0-1.4.3-.3.3-.4.6-.5 1.1l-2.1 9.8v.6c0 .5.4.8 1.4.8h.2l-.2.8H8l.2-.8h.2c1.1 0 1.8-.5 2-1.5l2-9.8.1-.5c0-.6-.4-.8-1.4-.8h-.3l.2-.9h5.8z"
                                                                                fill-rule="evenodd"></path>
                                                                        </svg></span></button></div>
                                                            <div title="" role="toolbar" data-alloy-tabstop="true"
                                                                tabindex="-1" class="tox-toolbar__group"><button
                                                                    aria-label="Align left" title="Align left"
                                                                    type="button" tabindex="-1" class="tox-tbtn"
                                                                    aria-disabled="false" aria-pressed="false"><span
                                                                        class="tox-icon tox-tbtn__icon-wrap"><svg
                                                                            width="24" height="24"
                                                                            focusable="false">
                                                                            <path
                                                                                d="M5 5h14c.6 0 1 .4 1 1s-.4 1-1 1H5a1 1 0 110-2zm0 4h8c.6 0 1 .4 1 1s-.4 1-1 1H5a1 1 0 110-2zm0 8h8c.6 0 1 .4 1 1s-.4 1-1 1H5a1 1 0 010-2zm0-4h14c.6 0 1 .4 1 1s-.4 1-1 1H5a1 1 0 010-2z"
                                                                                fill-rule="evenodd"></path>
                                                                        </svg></span></button><button
                                                                    aria-label="Align center" title="Align center"
                                                                    type="button" tabindex="-1" class="tox-tbtn"
                                                                    aria-disabled="false" aria-pressed="false"><span
                                                                        class="tox-icon tox-tbtn__icon-wrap"><svg
                                                                            width="24" height="24"
                                                                            focusable="false">
                                                                            <path
                                                                                d="M5 5h14c.6 0 1 .4 1 1s-.4 1-1 1H5a1 1 0 110-2zm3 4h8c.6 0 1 .4 1 1s-.4 1-1 1H8a1 1 0 110-2zm0 8h8c.6 0 1 .4 1 1s-.4 1-1 1H8a1 1 0 010-2zm-3-4h14c.6 0 1 .4 1 1s-.4 1-1 1H5a1 1 0 010-2z"
                                                                                fill-rule="evenodd"></path>
                                                                        </svg></span></button><button
                                                                    aria-label="Align right" title="Align right"
                                                                    type="button" tabindex="-1" class="tox-tbtn"
                                                                    aria-disabled="false" aria-pressed="false"><span
                                                                        class="tox-icon tox-tbtn__icon-wrap"><svg
                                                                            width="24" height="24"
                                                                            focusable="false">
                                                                            <path
                                                                                d="M5 5h14c.6 0 1 .4 1 1s-.4 1-1 1H5a1 1 0 110-2zm6 4h8c.6 0 1 .4 1 1s-.4 1-1 1h-8a1 1 0 010-2zm0 8h8c.6 0 1 .4 1 1s-.4 1-1 1h-8a1 1 0 010-2zm-6-4h14c.6 0 1 .4 1 1s-.4 1-1 1H5a1 1 0 010-2z"
                                                                                fill-rule="evenodd"></path>
                                                                        </svg></span></button><button aria-label="Justify"
                                                                    title="Justify" type="button" tabindex="-1"
                                                                    class="tox-tbtn" aria-disabled="false"
                                                                    aria-pressed="false"><span
                                                                        class="tox-icon tox-tbtn__icon-wrap"><svg
                                                                            width="24" height="24"
                                                                            focusable="false">
                                                                            <path
                                                                                d="M5 5h14c.6 0 1 .4 1 1s-.4 1-1 1H5a1 1 0 110-2zm0 4h14c.6 0 1 .4 1 1s-.4 1-1 1H5a1 1 0 110-2zm0 4h14c.6 0 1 .4 1 1s-.4 1-1 1H5a1 1 0 010-2zm0 4h14c.6 0 1 .4 1 1s-.4 1-1 1H5a1 1 0 010-2z"
                                                                                fill-rule="evenodd"></path>
                                                                        </svg></span></button></div>
                                                            <div title="" role="toolbar" data-alloy-tabstop="true"
                                                                tabindex="-1" class="tox-toolbar__group">
                                                                <div aria-pressed="false" aria-label="Bullet list"
                                                                    title="Bullet list" role="button"
                                                                    aria-haspopup="true" tabindex="-1" unselectable="on"
                                                                    class="tox-split-button" aria-disabled="false"
                                                                    aria-expanded="false"
                                                                    aria-describedby="aria_5835823911681688822701551"
                                                                    style="user-select: none;"><span role="presentation"
                                                                        class="tox-tbtn" aria-disabled="false"><span
                                                                            class="tox-icon tox-tbtn__icon-wrap"><svg
                                                                                width="24" height="24"
                                                                                focusable="false">
                                                                                <path
                                                                                    d="M11 5h8c.6 0 1 .4 1 1s-.4 1-1 1h-8a1 1 0 010-2zm0 6h8c.6 0 1 .4 1 1s-.4 1-1 1h-8a1 1 0 010-2zm0 6h8c.6 0 1 .4 1 1s-.4 1-1 1h-8a1 1 0 010-2zM4.5 6c0-.4.1-.8.4-1 .3-.4.7-.5 1.1-.5.4 0 .8.1 1 .4.4.3.5.7.5 1.1 0 .4-.1.8-.4 1-.3.4-.7.5-1.1.5-.4 0-.8-.1-1-.4-.4-.3-.5-.7-.5-1.1zm0 6c0-.4.1-.8.4-1 .3-.4.7-.5 1.1-.5.4 0 .8.1 1 .4.4.3.5.7.5 1.1 0 .4-.1.8-.4 1-.3.4-.7.5-1.1.5-.4 0-.8-.1-1-.4-.4-.3-.5-.7-.5-1.1zm0 6c0-.4.1-.8.4-1 .3-.4.7-.5 1.1-.5.4 0 .8.1 1 .4.4.3.5.7.5 1.1 0 .4-.1.8-.4 1-.3.4-.7.5-1.1.5-.4 0-.8-.1-1-.4-.4-.3-.5-.7-.5-1.1z"
                                                                                    fill-rule="evenodd"></path>
                                                                            </svg></span></span><span role="presentation"
                                                                        class="tox-tbtn tox-split-button__chevron"
                                                                        aria-disabled="false"><svg width="10"
                                                                            height="10" focusable="false">
                                                                            <path
                                                                                d="M8.7 2.2c.3-.3.8-.3 1 0 .4.4.4.9 0 1.2L5.7 7.8c-.3.3-.9.3-1.2 0L.2 3.4a.8.8 0 010-1.2c.3-.3.8-.3 1.1 0L5 6l3.7-3.8z"
                                                                                fill-rule="nonzero"></path>
                                                                        </svg></span><span aria-hidden="true"
                                                                        id="aria_5835823911681688822701551"
                                                                        style="display: none;">To open the popup, press
                                                                        Shift+Enter</span></div>
                                                                <div aria-pressed="false" aria-label="Numbered list"
                                                                    title="Numbered list" role="button"
                                                                    aria-haspopup="true" tabindex="-1" unselectable="on"
                                                                    class="tox-split-button" aria-disabled="false"
                                                                    aria-expanded="false"
                                                                    aria-describedby="aria_6533208711701688822701553"
                                                                    style="user-select: none;"><span role="presentation"
                                                                        class="tox-tbtn" aria-disabled="false"><span
                                                                            class="tox-icon tox-tbtn__icon-wrap"><svg
                                                                                width="24" height="24"
                                                                                focusable="false">
                                                                                <path
                                                                                    d="M10 17h8c.6 0 1 .4 1 1s-.4 1-1 1h-8a1 1 0 010-2zm0-6h8c.6 0 1 .4 1 1s-.4 1-1 1h-8a1 1 0 010-2zm0-6h8c.6 0 1 .4 1 1s-.4 1-1 1h-8a1 1 0 110-2zM6 4v3.5c0 .3-.2.5-.5.5a.5.5 0 01-.5-.5V5h-.5a.5.5 0 010-1H6zm-1 8.8l.2.2h1.3c.3 0 .5.2.5.5s-.2.5-.5.5H4.9a1 1 0 01-.9-1V13c0-.4.3-.8.6-1l1.2-.4.2-.3a.2.2 0 00-.2-.2H4.5a.5.5 0 01-.5-.5c0-.3.2-.5.5-.5h1.6c.5 0 .9.4.9 1v.1c0 .4-.3.8-.6 1l-1.2.4-.2.3zM7 17v2c0 .6-.4 1-1 1H4.5a.5.5 0 010-1h1.2c.2 0 .3-.1.3-.3 0-.2-.1-.3-.3-.3H4.4a.4.4 0 110-.8h1.3c.2 0 .3-.1.3-.3 0-.2-.1-.3-.3-.3H4.5a.5.5 0 110-1H6c.6 0 1 .4 1 1z"
                                                                                    fill-rule="evenodd"></path>
                                                                            </svg></span></span><span role="presentation"
                                                                        class="tox-tbtn tox-split-button__chevron"
                                                                        aria-disabled="false"><svg width="10"
                                                                            height="10" focusable="false">
                                                                            <path
                                                                                d="M8.7 2.2c.3-.3.8-.3 1 0 .4.4.4.9 0 1.2L5.7 7.8c-.3.3-.9.3-1.2 0L.2 3.4a.8.8 0 010-1.2c.3-.3.8-.3 1.1 0L5 6l3.7-3.8z"
                                                                                fill-rule="nonzero"></path>
                                                                        </svg></span><span aria-hidden="true"
                                                                        id="aria_6533208711701688822701553"
                                                                        style="display: none;">To open the popup, press
                                                                        Shift+Enter</span></div><button
                                                                    aria-label="Decrease indent" title="Decrease indent"
                                                                    type="button" tabindex="-1"
                                                                    class="tox-tbtn tox-tbtn--disabled"
                                                                    aria-disabled="true"><span
                                                                        class="tox-icon tox-tbtn__icon-wrap"><svg
                                                                            width="24" height="24"
                                                                            focusable="false">
                                                                            <path
                                                                                d="M7 5h12c.6 0 1 .4 1 1s-.4 1-1 1H7a1 1 0 110-2zm5 4h7c.6 0 1 .4 1 1s-.4 1-1 1h-7a1 1 0 010-2zm0 4h7c.6 0 1 .4 1 1s-.4 1-1 1h-7a1 1 0 010-2zm-5 4h12a1 1 0 010 2H7a1 1 0 010-2zm1.6-3.8a1 1 0 01-1.2 1.6l-3-2a1 1 0 010-1.6l3-2a1 1 0 011.2 1.6L6.8 12l1.8 1.2z"
                                                                                fill-rule="evenodd"></path>
                                                                        </svg></span></button><button
                                                                    aria-label="Increase indent" title="Increase indent"
                                                                    type="button" tabindex="-1" class="tox-tbtn"
                                                                    aria-disabled="false"><span
                                                                        class="tox-icon tox-tbtn__icon-wrap"><svg
                                                                            width="24" height="24"
                                                                            focusable="false">
                                                                            <path
                                                                                d="M7 5h12c.6 0 1 .4 1 1s-.4 1-1 1H7a1 1 0 110-2zm5 4h7c.6 0 1 .4 1 1s-.4 1-1 1h-7a1 1 0 010-2zm0 4h7c.6 0 1 .4 1 1s-.4 1-1 1h-7a1 1 0 010-2zm-5 4h12a1 1 0 010 2H7a1 1 0 010-2zm-2.6-3.8L6.2 12l-1.8-1.2a1 1 0 011.2-1.6l3 2a1 1 0 010 1.6l-3 2a1 1 0 11-1.2-1.6z"
                                                                                fill-rule="evenodd"></path>
                                                                        </svg></span></button>
                                                            </div>
                                                            <div title="" role="toolbar" data-alloy-tabstop="true"
                                                                tabindex="-1" class="tox-toolbar__group"><button
                                                                    aria-label="Insert/edit link" title="Insert/edit link"
                                                                    type="button" tabindex="-1" class="tox-tbtn"
                                                                    aria-disabled="false" aria-pressed="false"><span
                                                                        class="tox-icon tox-tbtn__icon-wrap"><svg
                                                                            width="24" height="24"
                                                                            focusable="false">
                                                                            <path
                                                                                d="M6.2 12.3a1 1 0 011.4 1.4l-2.1 2a2 2 0 102.7 2.8l4.8-4.8a1 1 0 000-1.4 1 1 0 111.4-1.3 2.9 2.9 0 010 4L9.6 20a3.9 3.9 0 01-5.5-5.5l2-2zm11.6-.6a1 1 0 01-1.4-1.4l2-2a2 2 0 10-2.6-2.8L11 10.3a1 1 0 000 1.4A1 1 0 119.6 13a2.9 2.9 0 010-4L14.4 4a3.9 3.9 0 015.5 5.5l-2 2z"
                                                                                fill-rule="nonzero"></path>
                                                                        </svg></span></button><button
                                                                    aria-label="Insert/edit image"
                                                                    title="Insert/edit image" type="button"
                                                                    tabindex="-1" class="tox-tbtn" aria-disabled="false"
                                                                    aria-pressed="false"><span
                                                                        class="tox-icon tox-tbtn__icon-wrap"><svg
                                                                            width="24" height="24"
                                                                            focusable="false">
                                                                            <path
                                                                                d="M5 15.7l3.3-3.2c.3-.3.7-.3 1 0L12 15l4.1-4c.3-.4.8-.4 1 0l2 1.9V5H5v10.7zM5 18V19h3l2.8-2.9-2-2L5 17.9zm14-3l-2.5-2.4-6.4 6.5H19v-4zM4 3h16c.6 0 1 .4 1 1v16c0 .6-.4 1-1 1H4a1 1 0 01-1-1V4c0-.6.4-1 1-1zm6 8a2 2 0 100-4 2 2 0 000 4z"
                                                                                fill-rule="nonzero"></path>
                                                                        </svg></span></button></div>
                                                        </div>
                                                        <div role="group" class="tox-toolbar" aria-disabled="false">
                                                            <div title="" role="toolbar" data-alloy-tabstop="true"
                                                                tabindex="-1" class="tox-toolbar__group"><button
                                                                    aria-label="Print" title="Print" type="button"
                                                                    tabindex="-1" class="tox-tbtn"
                                                                    aria-disabled="false"><span
                                                                        class="tox-icon tox-tbtn__icon-wrap"><svg
                                                                            width="24" height="24"
                                                                            focusable="false">
                                                                            <path
                                                                                d="M18 8H6a3 3 0 00-3 3v6h2v3h14v-3h2v-6a3 3 0 00-3-3zm-1 10H7v-4h10v4zm.5-5c-.8 0-1.5-.7-1.5-1.5s.7-1.5 1.5-1.5 1.5.7 1.5 1.5-.7 1.5-1.5 1.5zm.5-8H6v2h12V5z"
                                                                                fill-rule="nonzero"></path>
                                                                        </svg></span></button><button aria-label="Preview"
                                                                    title="Preview" type="button" tabindex="-1"
                                                                    class="tox-tbtn" aria-disabled="false"><span
                                                                        class="tox-icon tox-tbtn__icon-wrap"><svg
                                                                            width="24" height="24"
                                                                            focusable="false">
                                                                            <path
                                                                                d="M3.5 12.5c.5.8 1.1 1.6 1.8 2.3 2 2 4.2 3.2 6.7 3.2s4.7-1.2 6.7-3.2a16.2 16.2 0 002.1-2.8 15.7 15.7 0 00-2.1-2.8c-2-2-4.2-3.2-6.7-3.2a9.3 9.3 0 00-6.7 3.2A16.2 16.2 0 003.2 12c0 .2.2.3.3.5zm-2.4-1l.7-1.2L4 7.8C6.2 5.4 8.9 4 12 4c3 0 5.8 1.4 8.1 3.8a18.2 18.2 0 012.8 3.7v1l-.7 1.2-2.1 2.5c-2.3 2.4-5 3.8-8.1 3.8-3 0-5.8-1.4-8.1-3.8a18.2 18.2 0 01-2.8-3.7 1 1 0 010-1zm12-3.3a2 2 0 102.7 2.6 4 4 0 11-2.6-2.6z"
                                                                                fill-rule="nonzero"></path>
                                                                        </svg></span></button><button
                                                                    aria-label="Insert/edit media"
                                                                    title="Insert/edit media" type="button"
                                                                    tabindex="-1" class="tox-tbtn" aria-disabled="false"
                                                                    aria-pressed="false"><span
                                                                        class="tox-icon tox-tbtn__icon-wrap"><svg
                                                                            width="24" height="24"
                                                                            focusable="false">
                                                                            <path
                                                                                d="M4 3h16c.6 0 1 .4 1 1v16c0 .6-.4 1-1 1H4a1 1 0 01-1-1V4c0-.6.4-1 1-1zm1 2v14h14V5H5zm4.8 2.6l5.6 4a.5.5 0 010 .8l-5.6 4A.5.5 0 019 16V8a.5.5 0 01.8-.4z"
                                                                                fill-rule="nonzero"></path>
                                                                        </svg></span></button></div>
                                                            <div title="" role="toolbar" data-alloy-tabstop="true"
                                                                tabindex="-1" class="tox-toolbar__group">
                                                                <div aria-pressed="false" aria-label="Text color"
                                                                    title="Text color" role="button"
                                                                    aria-haspopup="true" tabindex="-1" unselectable="on"
                                                                    class="tox-split-button" aria-disabled="false"
                                                                    aria-expanded="false"
                                                                    aria-describedby="aria_9197506261801688822701595"
                                                                    style="user-select: none;"><span role="presentation"
                                                                        class="tox-tbtn" aria-disabled="false"><span
                                                                            class="tox-icon tox-tbtn__icon-wrap"><svg
                                                                                width="24" height="24"
                                                                                focusable="false">
                                                                                <g fill-rule="evenodd">
                                                                                    <path id="tox-icon-text-color__color"
                                                                                        d="M3 18h18v3H3z"></path>
                                                                                    <path
                                                                                        d="M8.7 16h-.8a.5.5 0 01-.5-.6l2.7-9c.1-.3.3-.4.5-.4h2.8c.2 0 .4.1.5.4l2.7 9a.5.5 0 01-.5.6h-.8a.5.5 0 01-.4-.4l-.7-2.2c0-.3-.3-.4-.5-.4h-3.4c-.2 0-.4.1-.5.4l-.7 2.2c0 .3-.2.4-.4.4zm2.6-7.6l-.6 2a.5.5 0 00.5.6h1.6a.5.5 0 00.5-.6l-.6-2c0-.3-.3-.4-.5-.4h-.4c-.2 0-.4.1-.5.4z">
                                                                                    </path>
                                                                                </g>
                                                                            </svg></span></span><span role="presentation"
                                                                        class="tox-tbtn tox-split-button__chevron"
                                                                        aria-disabled="false"><svg width="10"
                                                                            height="10" focusable="false">
                                                                            <path
                                                                                d="M8.7 2.2c.3-.3.8-.3 1 0 .4.4.4.9 0 1.2L5.7 7.8c-.3.3-.9.3-1.2 0L.2 3.4a.8.8 0 010-1.2c.3-.3.8-.3 1.1 0L5 6l3.7-3.8z"
                                                                                fill-rule="nonzero"></path>
                                                                        </svg></span><span aria-hidden="true"
                                                                        id="aria_9197506261801688822701595"
                                                                        style="display: none;">To open the popup, press
                                                                        Shift+Enter</span></div>
                                                                <div aria-pressed="false" aria-label="Background color"
                                                                    title="Background color" role="button"
                                                                    aria-haspopup="true" tabindex="-1" unselectable="on"
                                                                    class="tox-split-button" aria-disabled="false"
                                                                    aria-expanded="false"
                                                                    aria-describedby="aria_9244636911821688822701596"
                                                                    style="user-select: none;"><span role="presentation"
                                                                        class="tox-tbtn" aria-disabled="false"><span
                                                                            class="tox-icon tox-tbtn__icon-wrap"><svg
                                                                                width="24" height="24"
                                                                                focusable="false">
                                                                                <g fill-rule="evenodd">
                                                                                    <path
                                                                                        id="tox-icon-highlight-bg-color__color"
                                                                                        d="M3 18h18v3H3z"></path>
                                                                                    <path fill-rule="nonzero"
                                                                                        d="M7.7 16.7H3l3.3-3.3-.7-.8L10.2 8l4 4.1-4 4.2c-.2.2-.6.2-.8 0l-.6-.7-1.1 1.1zm5-7.5L11 7.4l3-2.9a2 2 0 012.6 0L18 6c.7.7.7 2 0 2.7l-2.9 2.9-1.8-1.8-.5-.6">
                                                                                    </path>
                                                                                </g>
                                                                            </svg></span></span><span role="presentation"
                                                                        class="tox-tbtn tox-split-button__chevron"
                                                                        aria-disabled="false"><svg width="10"
                                                                            height="10" focusable="false">
                                                                            <path
                                                                                d="M8.7 2.2c.3-.3.8-.3 1 0 .4.4.4.9 0 1.2L5.7 7.8c-.3.3-.9.3-1.2 0L.2 3.4a.8.8 0 010-1.2c.3-.3.8-.3 1.1 0L5 6l3.7-3.8z"
                                                                                fill-rule="nonzero"></path>
                                                                        </svg></span><span aria-hidden="true"
                                                                        id="aria_9244636911821688822701596"
                                                                        style="display: none;">To open the popup, press
                                                                        Shift+Enter</span></div><button
                                                                    aria-label="Emoticons" title="Emoticons"
                                                                    type="button" tabindex="-1" class="tox-tbtn"
                                                                    aria-disabled="false"><span
                                                                        class="tox-icon tox-tbtn__icon-wrap"><svg
                                                                            width="24" height="24"
                                                                            focusable="false">
                                                                            <path
                                                                                d="M9 11c.6 0 1-.4 1-1s-.4-1-1-1a1 1 0 00-1 1c0 .6.4 1 1 1zm6 0c.6 0 1-.4 1-1s-.4-1-1-1a1 1 0 00-1 1c0 .6.4 1 1 1zm-3 5.5c2.1 0 4-1.5 4.4-3.5H7.6c.5 2 2.3 3.5 4.4 3.5zM12 4a8 8 0 100 16 8 8 0 000-16zm0 14.5a6.5 6.5 0 110-13 6.5 6.5 0 010 13z"
                                                                                fill-rule="nonzero"></path>
                                                                        </svg></span></button>
                                                            </div>
                                                            <div title="" role="toolbar" data-alloy-tabstop="true"
                                                                tabindex="-1" class="tox-toolbar__group"><button
                                                                    aria-label="Insert/edit code sample"
                                                                    title="Insert/edit code sample" type="button"
                                                                    tabindex="-1" class="tox-tbtn" aria-disabled="false"
                                                                    aria-pressed="false"><span
                                                                        class="tox-icon tox-tbtn__icon-wrap"><svg
                                                                            width="24" height="26"
                                                                            focusable="false">
                                                                            <path
                                                                                d="M7.1 11a2.8 2.8 0 01-.8 2 2.8 2.8 0 01.8 2v1.7c0 .3.1.6.4.8.2.3.5.4.8.4.3 0 .4.2.4.4v.8c0 .2-.1.4-.4.4-.7 0-1.4-.3-2-.8-.5-.6-.8-1.3-.8-2V15c0-.3-.1-.6-.4-.8-.2-.3-.5-.4-.8-.4a.4.4 0 01-.4-.4v-.8c0-.2.2-.4.4-.4.3 0 .6-.1.8-.4.3-.2.4-.5.4-.8V9.3c0-.7.3-1.4.8-2 .6-.5 1.3-.8 2-.8.3 0 .4.2.4.4v.8c0 .2-.1.4-.4.4-.3 0-.6.1-.8.4-.3.2-.4.5-.4.8V11zm9.8 0V9.3c0-.3-.1-.6-.4-.8-.2-.3-.5-.4-.8-.4a.4.4 0 01-.4-.4V7c0-.2.1-.4.4-.4.7 0 1.4.3 2 .8.5.6.8 1.3.8 2V11c0 .3.1.6.4.8.2.3.5.4.8.4.2 0 .4.2.4.4v.8c0 .2-.2.4-.4.4-.3 0-.6.1-.8.4-.3.2-.4.5-.4.8v1.7c0 .7-.3 1.4-.8 2-.6.5-1.3.8-2 .8a.4.4 0 01-.4-.4v-.8c0-.2.1-.4.4-.4.3 0 .6-.1.8-.4.3-.2.4-.5.4-.8V15a2.8 2.8 0 01.8-2 2.8 2.8 0 01-.8-2zm-3.3-.4c0 .4-.1.8-.5 1.1-.3.3-.7.5-1.1.5-.4 0-.8-.2-1.1-.5-.4-.3-.5-.7-.5-1.1 0-.5.1-.9.5-1.2.3-.3.7-.4 1.1-.4.4 0 .8.1 1.1.4.4.3.5.7.5 1.2zM12 13c.4 0 .8.1 1.1.5.4.3.5.7.5 1.1 0 1-.1 1.6-.5 2a3 3 0 01-1.1 1c-.4.3-.8.4-1.1.4a.5.5 0 01-.5-.5V17a3 3 0 001-.2l.6-.6c-.6 0-1-.2-1.3-.5-.2-.3-.3-.7-.3-1 0-.5.1-1 .5-1.2.3-.4.7-.5 1.1-.5z"
                                                                                fill-rule="evenodd"></path>
                                                                        </svg></span></button><button aria-label="Help"
                                                                    title="Help" type="button" tabindex="-1"
                                                                    class="tox-tbtn" aria-disabled="false"><span
                                                                        class="tox-icon tox-tbtn__icon-wrap"><svg
                                                                            width="24" height="24"
                                                                            focusable="false">
                                                                            <g fill-rule="evenodd">
                                                                                <path
                                                                                    d="M12 5.5a6.5 6.5 0 00-6 9 6.3 6.3 0 001.4 2l1 1a6.3 6.3 0 003.6 1 6.5 6.5 0 006-9 6.3 6.3 0 00-1.4-2l-1-1a6.3 6.3 0 00-3.6-1zM12 4a7.8 7.8 0 015.7 2.3A8 8 0 1112 4z">
                                                                                </path>
                                                                                <path
                                                                                    d="M9.6 9.7a.7.7 0 01-.7-.8c0-1.1 1.5-1.8 3.2-1.8 1.8 0 3.2.8 3.2 2.4 0 1.4-.4 2.1-1.5 2.8-.2 0-.3.1-.3.2a2 2 0 00-.8.8.8.8 0 01-1.4-.6c.3-.7.8-1 1.3-1.5l.4-.2c.7-.4.8-.6.8-1.5 0-.5-.6-.9-1.7-.9-.5 0-1 .1-1.4.3-.2 0-.3.1-.3.2v-.2c0 .4-.4.8-.8.8z"
                                                                                    fill-rule="nonzero"></path>
                                                                                <circle cx="12" cy="16"
                                                                                    r="1"></circle>
                                                                            </g>
                                                                        </svg></span></button></div>
                                                        </div>
                                                    </div>
                                                    <div class="tox-anchorbar"></div>
                                                </div>
                                                <div class="tox-sidebar-wrap">
                                                    <div class="tox-edit-area"><iframe id="tinyMceExample_ifr"
                                                            frameborder="0" allowtransparency="true"
                                                            title="Rich Text Area. Press ALT-0 for help."
                                                            class="tox-edit-area__iframe"></iframe></div>
                                                    <div role="complementary" class="tox-sidebar">
                                                        <div data-alloy-tabstop="true" tabindex="-1"
                                                            class="tox-sidebar__slider tox-sidebar--sliding-closed"
                                                            style="width: 0px;">
                                                            <div class="tox-sidebar__pane-container"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tox-statusbar">
                                                <div class="tox-statusbar__text-container">
                                                    <div role="navigation" data-alloy-tabstop="true"
                                                        class="tox-statusbar__path" aria-disabled="false">
                                                        <div role="button" data-index="0" tab-index="-1" aria-level="1"
                                                            tabindex="-1" class="tox-statusbar__path-item"
                                                            aria-disabled="false">p</div>
                                                    </div><button type="button" tabindex="-1" data-alloy-tabstop="true"
                                                        class="tox-statusbar__wordcount">4 words</button><span
                                                        class="tox-statusbar__branding"><a
                                                            href="https://www.tiny.cloud/?utm_campaign=editor_referral&amp;utm_medium=poweredby&amp;utm_source=tinymce&amp;utm_content=v5"
                                                            rel="noopener" target="_blank" tabindex="-1"
                                                            aria-label="Powered by Tiny">Powered by Tiny</a></span>
                                                </div>
                                                <div title="Resize" data-alloy-tabstop="true" tabindex="-1"
                                                    class="tox-statusbar__resize-handle"><svg width="10"
                                                        height="10" focusable="false">
                                                        <g fill-rule="nonzero">
                                                            <path
                                                                d="M8.1 1.1A.5.5 0 119 2l-7 7A.5.5 0 111 8l7-7zM8.1 5.1A.5.5 0 119 6l-3 3A.5.5 0 115 8l3-3z">
                                                            </path>
                                                        </g>
                                                    </svg></div>
                                            </div>
                                            <div aria-hidden="true" class="tox-throbber" style="display: none;"></div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>



                        <button type="submit" class="mr-2 btn btn-primary">Submit</button>
                        <button class="btn btn-dark">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
