@extends('agent.dashboard')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <div class="page-content">
        <nav class="page-breadcrumb">
            <div class="btn-group me-2">
                <a href="{{ route('agent.property.create') }}" class="btn btn-primary">Add Property
                </a>
            </div>
        </nav>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center mb-3 mt-4">Choose a plan</h3>
                        
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4 stretch-card grid-margin grid-margin-md-0">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="text-center mt-3 mb-4">Basic</h4>
                                            <i data-feather="award" class="text-primary icon-xxl d-block mx-auto my-3"></i>
                                            <h1 class="text-center">$0</h1>
                                            <p class="text-muted text-center mb-4 fw-light">per month</p>
                                            <h5 class="text-primary text-center mb-4">Up to 1 units</h5>
                                            <table class="mx-auto">
                                                <tr>
                                                    <td><i data-feather="check" class="icon-md text-primary me-2"></i></td>
                                                    <td>
                                                        <p>Up to 1 units</p>
                                                    </td>
                                                </tr>
                                                
                                                <tr>
                                                    <td><i data-feather="x" class="icon-md text-danger me-2"></i></td>
                                                    <td>
                                                        <p class="text-muted">Premium apps</p>
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="d-grid">
                                                 <a class="btn btn-primary mt-4" href="{{ route('agent.package.buy', 'basic') }}"> Start Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 stretch-card grid-margin grid-margin-md-0">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="text-center mt-3 mb-4">Business</h4>
                                            <i data-feather="gift" class="text-success icon-xxl d-block mx-auto my-3"></i>
                                            <h1 class="text-center">$20</h1>
                                            <p class="text-muted text-center mb-4 fw-light">per month</p>
                                            <h5 class="text-success text-center mb-4">Up to 3 units</h5>
                                            <table class="mx-auto">
                                                <tr>
                                                    <td><i data-feather="check" class="icon-md text-primary me-2"></i></td>
                                                    <td>
                                                        <p>Up to 3 units</p>
                                                    </td>
                                                </tr>
                                                
                                                <tr>
                                                    <td><i data-feather="check" class="icon-md text-primary me-2"></i></td>
                                                    <td>
                                                        <p>Dedicated account manager</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><i data-feather="x" class="icon-md text-primary me-2"></i></td>
                                                    <td>
                                                        <p class="text-muted">Premium apps</p>
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="d-grid">
                                                <a class="btn btn-primary mt-4" href="{{ route('agent.package.buy', 'business') }}"> Start Now</a>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 stretch-card">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="text-center mt-3 mb-4">Professional</h4>
                                            <i data-feather="briefcase"
                                                class="text-primary icon-xxl d-block mx-auto my-3"></i>
                                            <h1 class="text-center">$100</h1>
                                            <p class="text-muted text-center mb-4 fw-light">per month</p>
                                            <h5 class="text-primary text-center mb-4">Up to 50 units</h5>
                                            <table class="mx-auto">
                                                <tr>
                                                    <td><i data-feather="check" class="icon-md text-primary me-2"></i></td>
                                                    <td>
                                                        <p>Accounting dashboard</p>
                                                    </td>
                                                </tr>
                                                
                                                <tr>
                                                    <td><i data-feather="check" class="icon-md text-primary me-2"></i></td>
                                                    <td>
                                                        <p>Up to 50 units</p>
                                                    </td>
                                                </tr>
                                                
                                                <tr>
                                                    <td><i data-feather="check" class="icon-md text-primary me-2"></i></td>
                                                    <td>
                                                        <p>Dedicated Chatbot</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><i data-feather="check" class="icon-md text-primary me-2"></i></td>
                                                    <td>
                                                        <p>Premium apps</p>
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="d-grid">
                                                <a class="btn btn-primary mt-4" href="{{ route('agent.package.buy', 'professional') }}"> Start Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
