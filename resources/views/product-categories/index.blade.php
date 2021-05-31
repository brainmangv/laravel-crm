@extends('laravel-crm::layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">
            @include('laravel-crm::layouts.partials.nav-settings')
        </div>
        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane active" id="roles" role="tabpanel">
                    <h3 class="mb-3"> Product categories  <span class="float-right"><a type="button" class="btn btn-primary btn-sm" href="{{ url(route('laravel-crm.product-categories.create')) }}"><span class="fa fa-plus"></span>  Add product category</a></span></h3>
                    <div class="table-responsive">
                        <table class="table mb-0 card-table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Created</th>
                                <th scope="col">Updated</th>
                                <th scope="col">Products</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($productCategories as $productCategory)
                                <tr class="has-link" data-url="{{ url(route('laravel-crm.product-categories.show',$productCategory)) }}">
                                    <td>{{ $productCategory->name }}</td>
                                    <td>{{ $productCategory->created_at->toFormattedDateString() }}</td>
                                    <td>{{ $productCategory->updated_at->toFormattedDateString() }}</td>
                                    <td>{{ $productCategory->products->count() }}</td>
                                    <td class="disable-link text-right">
                                        <a href="{{  route('laravel-crm.product-categories.show',$productCategory) }}" class="btn btn-outline-secondary btn-sm"><span class="fa fa-eye" aria-hidden="true"></span></a>
                                        <a href="{{  route('laravel-crm.product-categories.edit',$productCategory) }}" class="btn btn-outline-secondary btn-sm"><span class="fa fa-edit" aria-hidden="true"></span></a>
                                        <form action="{{ route('laravel-crm.product-categories.destroy',$productCategory) }}" method="POST" class="form-check-inline mr-0 form-delete-button">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button class="btn btn-danger btn-sm" type="submit" data-model="productCategory"><span class="fa fa-trash-o" aria-hidden="true"></span></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @if($productCategories instanceof \Illuminate\Pagination\LengthAwarePaginator )
            @component('laravel-crm::components.card-footer')
                {{ $productCategories->links() }}
            @endcomponent
        @endif
    </div>

@endsection