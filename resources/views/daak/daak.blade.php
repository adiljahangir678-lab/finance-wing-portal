@extends('masterlayout')

@section('title')
    Daily Daak Management - {{ Auth::user()->branch_name }}
@endsection

@section('content')

<!-- Page Title & Branch Indicator -->
<div class="row mb-3">
    <div class="col-12 d-flex align-items-center justify-content-between">
        <div>
            <h4 class="page-title font-weight-bold text-dark m-1">DAILY DAAK REGISTER</h4>
            <small class="text-muted">Branch: <span class="text-primary font-weight-bold text-uppercase">{{ Auth::user()->branch_name }}</span></small>
        </div>
        <div>
            <span class="badge badge-soft-primary px-3 py-2 font-size-13 border border-primary">
                <i class="fe-calendar mr-1"></i> {{ date('d-M-Y') }}
            </span>
        </div>
    </div>
</div>

<!-- Success Alert -->
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fe-check-circle mr-1"></i> {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<!-- Validation Errors -->
@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul class="mb-0 pl-3">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<!-- 1. DAAK ENTRY FORM CARD -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card shadow-sm border-0 rounded-lg">
            <div class="card-header bg-white border-bottom py-3 d-flex align-items-center" style="border-left: 4px solid #3f7edb !important;">
                <h5 class="card-title text-dark font-weight-bold m-0" style="font-size: 1rem;">
                    <i class="fe-file-plus mr-2 text-primary"></i>Add New Daak
                </h5>
            </div>
            
            <div class="card-body p-4">
                <form action="{{ route('daak.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <!-- Received From -->
                        <div class="col-md-5 form-group">
                            <label class="font-weight-bold text-secondary small text-uppercase">
                                Received From <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" name="received_from" value="{{ old('received_from') }}" placeholder="e.g. DIGP South, Central Store" required>
                        </div>

                        <!-- Category / Head -->
                        <div class="col-md-4 form-group">
                            <label class="font-weight-bold text-secondary small text-uppercase">
                                Head / Category <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" name="category" value="{{ old('category') }}" placeholder="e.g. POL, Repair, Reward" required>
                        </div>

                        <!-- Receipt Date -->
                        <div class="col-md-3 form-group">
                            <label class="font-weight-bold text-secondary small text-uppercase">
                                Receipt Date <span class="text-danger">*</span>
                            </label>
                            <input type="date" class="form-control" name="received_date" value="{{ old('received_date', date('Y-m-d')) }}" required>
                        </div>

                        <!-- Subject -->
                        <div class="col-md-12 form-group">
                            <label class="font-weight-bold text-secondary small text-uppercase">
                                Subject / Particulars <span class="text-danger">*</span>
                            </label>
                            <textarea class="form-control" name="subject" rows="2" placeholder="Enter complete subject or details..." required>{{ old('subject') }}</textarea>
                        </div>

                       

                        <!-- PDF Upload -->
                        <div class="col-md-12 form-group">
                            <label class="font-weight-bold text-secondary small text-uppercase">
                                Document 1st-page Attachment (PDF Only) <span class="text-danger">*</span>
                            </label>
                            <input type="file" class="form-control-file border rounded p-2 w-100" name="pdf_file" accept=".pdf" required>
                        </div>

                        <!-- Submit Button -->
                        <div class="col-12 text-right mt-2">
                            <button type="submit" class="btn btn-primary px-4 font-weight-bold shadow-sm">
                                <i class="fe-check-circle mr-1"></i> Save Daak Record
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- SEARCH & DATE FILTER BAR -->
<div class="row mb-3">
    <div class="col-12">
        <div class="card shadow-sm border-0 p-3">
            <form action="{{ route('daak.index') }}" method="GET">
                <div class="row align-items-center">
                    <!-- Search Input -->
                    <div class="col-md-4 mb-2">
                        <input type="text" name="search" class="form-control" placeholder="Search Subject or Sender..." value="{{ request('search') }}">
                    </div>

                    <!-- From Date -->
                    <div class="col-md-3 mb-2">
                        <input type="date" name="from_date" class="form-control" value="{{ request('from_date') }}" title="From Date">
                    </div>

                    <!-- To Date -->
                    <div class="col-md-3 mb-2">
                        <input type="date" name="to_date" class="form-control" value="{{ request('to_date') }}" title="To Date">
                    </div>

                    <!-- Buttons -->
                    <div class="col-md-2 mb-2 d-flex gap-2">
                        <button type="submit" class="btn btn-primary w-100"><i class="fe-search"></i> Filter</button>
                        <a href="{{ route('daak.index') }}" class="btn btn-light" title="Reset"><i class="fe-refresh-cw"></i></a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- 2. RECENT DAAK RECORDS TABLE CARD -->
<div class="row">
    <div class="col-12">
        <div class="card shadow-sm border-0 rounded-lg">
            <div class="card-header bg-white border-bottom py-3 d-flex align-items-center justify-content-between" style="border-left: 4px solid #28a745 !important;">
                <h5 class="card-title text-dark font-weight-bold m-0" style="font-size: 1rem;">
                    <i class="fe-list mr-2 text-success"></i>Recent Daily Daak Entries
                </h5>
            </div>

            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover table-striped mb-0 align-middle">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Branch</th>
                                <th>Received From</th>
                                <th>Category</th>
                                <th>Date</th>
                                <th>Subject</th>
                                <th>Attachment</th>
                                <th>Entered By</th>
                                <th>Daak Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($daaks as $index => $daak)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td><span class="badge badge-soft-info text-uppercase">{{ $daak->branch_name }}</span></td>
                                    <td class="font-weight-bold">{{ $daak->received_from }}</td>
                                    <td><span class="badge badge-light border">{{ $daak->category }}</span></td>
                                    <td>{{ date('d-M-Y', strtotime($daak->received_date)) }}</td>
                                    <td>{{ Str::limit($daak->subject, 40) }}</td>
                                    <td>
                                        <a href="{{ asset('storage/' . $daak->pdf_path) }}" target="_blank" class="btn btn-sm btn-outline-danger">
                                            <i class="fe-file-text mr-1"></i> View PDF
                                        </a>
                                    </td>
                                    <td><small class="text-muted">{{ $daak->user->branch_incharge_name ?? 'N/A' }}</small></td>
                                    <td><small class="text-muted">{{ $daak->user->status ?? 'N/A' }}</small></td>
                                    
                                   

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center py-4 text-muted">
                                        <i class="fe-inbox font-size-24 d-block mb-1"></i> No Daak entries found yet.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection