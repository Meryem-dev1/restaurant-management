@extends('layouts.app')


@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-8">
                                <h3 class="text-secondary border-bottom mb-3 p-2">
                                    <i class="fas fa-plus"></i> edit  {{ $table->name }}
                                </h3>
                                <form action="{{ route("tables.update", $table->id) }}" method="post">
                                    @csrf
                                    @method("PUT")

                                    <div class="form-group">
                                        <select name="status" class="form-control">

                                            <option {{ $table->status === "avaliabe" ? "selected" : "" }} value="avaliabe">avaliabe</option>
                                            <option {{ $table->status === "inavaliabe"? "selected" : "" }} value="inavaliabe">inavaliabe</option>
                                            <option {{ $table->status === "pending"? "selected" : "" }} value="pending">pending</option>
                                        </select>
                                    </div>
                                    <div class="form-group mt-3">
                                        <button class="btn btn-primary">
                                         validate
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
