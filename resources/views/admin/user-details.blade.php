@extends('admin.layout.app')
@section('content')


    <main id="main-container">

        <!-- Hero -->
        <div class="bg-image" style="background-image: url(https://www.valutrades.com/hs-fs/hubfs/range-trading-image.jpg?width=668&height=374&name=range-trading-image.jpg);">
            <div class="bg-black-25">
                <div class="content content-full">
                    <div class="py-5 text-center">
                        <a class="img-link" >
                            <img class="img-avatar img-avatar96 img-avatar-thumb" src="{{ asset('assets/media/avatars/avatar10.jpg') }}" alt="">
                        </a>
                        <h1 class="fw-bold my-2 text-white">{{ $user->name }}</h1>
                        <h2 class="h4 fw-bold text-white-75">
                             <a class="text-primary-lighter" href="javascript:void(0)">{{ $user->email }}</a>
                        </h2>
                        <h2 class="h4 fw-bold text-white-75">
                          Account Balance <a class="text-primary-lighter" href="javascript:void(0)">{{ $user->acct_bal }}</a>
                        </h2>

                        <button type="button" class="btn btn-primary m-1">
                            <i class="fa fa-fw fa-arrow-down opacity-50 me-1"></i> Deposits
                        </button>
                        <button type="button" class="btn btn-secondary m-1">
                            <i class="fa fa-fw fa-arrow-up opacity-50 me-1"></i> Withdrawals
                        </button>
                        <button type="button" class="btn btn-info m-1">
                            <i class="fa fa-fw fa-dollar-sign opacity-50 me-1"></i> Investments
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Hero -->

        <!-- Page Content -->
        <div class="content content-full content-boxed">
            <!-- Latest Friends -->
            <h2 class="content-heading">
                <i class="si si-users me-1"></i> User Details
            </h2>
            <table class="table table-striped" style="width:100%">
                <tr>
                    <th>Name:</th>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <th>Email:</th>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <th>Phone:</th>
                    <td>{{ $user->phone }}</td>
                </tr>
                <tr>
                    <th>Country:</th>
                    <td>{{ $user->country }}</td>
                </tr>
                <tr>
                    <th>Wallet Address:</th>
                    <td>{{ $user->wallet_address }}</td>
                </tr>
            </table>

            <!-- END Latest Friends -->
            <h4>Fund Account</h4>
            <form action="{{ route('admin.fund') }}" method="POST">
                @csrf
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                <div class="form-group">
                    <div class="col-6">
                        <input type="text" class="form-control" name="amount">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Fund</button>
            </form>

            <form action="{{ route('admin.debit') }}" method="POST">
                @csrf
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                <div class="form-group">
                    <div class="col-6">
                        <input type="text" class="form-control" name="amount">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Debit</button>
            </form>

            <!-- END Latest Projects -->


        </div>
        <!-- END Page Content -->
    </main>
@endsection
