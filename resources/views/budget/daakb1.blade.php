@extends('masterlayout')

@section('title')
    Daily Daak - Budget Branch-I
@endsection

@section('content')

<!-- Page Title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="page-title font-weight-bold text-dark">BUDGET BRANCH-I (DAILY DAAK ENTRY)</h4>
            <div class="page-title-right">
                <span class="badge badge-soft-primary px-3 py-2 font-size-13 border border-primary">
                    <i class="fe-calendar mr-1"></i> {{ date('d-M-Y') }}
                </span>
            </div>
        </div>
    </div>
</div>



<!-- Daily Daak Form Card -->
<div class="row">
    <div class="col-12">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white font-weight-bold py-2">
                <i class="fe-file-text mr-1"></i> Add New Daily Daak
            </div>
            
            <div class="card-body p-4">
                <form action="#" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <!-- 1. Received From -->
                        <div class="col-md-6 form-group">
                            <label for="received_from" class="font-weight-bold text-dark small text-uppercase">
                                Received From <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" id="received_from" name="received_from" placeholder="e.g. DIGP South, CPO Finance Wing, Central Store" required>
                        </div>

                        <!-- 2. Category / Head (Short Category like POL, Repair, Reward) -->
                        <div class="col-md-3 form-group">
                            <label for="category" class="font-weight-bold text-dark small text-uppercase">
                                Category / Head <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" id="category" name="category" placeholder="e.g. POL, Repair, Reward" required>
                        </div>

                        <!-- 3. Received Date -->
                        <div class="col-md-3 form-group">
                            <label for="received_date" class="font-weight-bold text-dark small text-uppercase">
                                Received Date <span class="text-danger">*</span>
                            </label>
                            <input type="date" class="form-control" id="received_date" name="received_date" value="{{ date('Y-m-d') }}" required>
                        </div>

                        <!-- 4. Subject -->
                        <div class="col-md-12 form-group">
                            <label for="subject" class="font-weight-bold text-dark small text-uppercase">
                                Subject / Details <span class="text-danger">*</span>
                            </label>
                            <textarea class="form-control" id="subject" name="subject" rows="3" placeholder="Enter complete subject or details of the Daak..." required></textarea>
                        </div>

                        <!-- 5. PDF Upload -->
                        <div class="col-md-12 form-group">
                            <label for="pdf_file" class="font-weight-bold text-dark small text-uppercase">
                                Upload Daak File (PDF Only) <span class="text-danger">*</span>
                            </label>
                            <input type="file" class="form-control-file border rounded p-2 w-100" id="pdf_file" name="pdf_file" accept=".pdf" required>
                            <small class="form-text text-muted">Aap sirf PDF format ki file upload kar sakte hain.</small>
                        </div>

                        <!-- Buttons -->
                        <div class="col-12 mt-3 text-right">
                            <button type="reset" class="btn btn-secondary mr-2 px-3">
                                <i class="fe-rotate-ccw mr-1"></i> Reset
                            </button>
                            <button type="submit" class="btn btn-primary px-4">
                                <i class="fe-save mr-1"></i> Save Daak
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection