<div>
    <div class="container col-5 m-auto pb-5">
        <h1><input type="radio" wire:model="report_type" name="report_type" value="dynamic">
            Generate Dynamic Report</h1>
        <h1><input type="radio" wire:model="report_type" name="report_type" value="static">
            Generate Static Report</h1>
    </div>
    <div class="container">

        <div class="row">
            <div class="col-7 m-auto">
                <form action="{{ route('export') }}" method="get" class="col-lg-7">

                    <div class="mb-3">
                        <h4>Filter By</h4>
                    </div>
                    @if ($report_type == 'dynamic')
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select name="categories[]" multiple="" value="{{ old('category') }}" class="form-control"
                                id="category">
                                <option value="all">All</option>
                                <option value="journal">Journal</option>
                                <option value="conference">Conference Paper</option>
                                <option value="thesis">Thesis</option>
                                <option value="chapter">Book Chapter</option>
                                <option value="book">Book</option>
                                <option value="patent">Patent</option>

                            </select>

                        </div>
                    @endif
                    <div class="form-group">
                        <label for="published_from">Published From</label>
                        <input name="published_from" id="published_from" type="date" class="form-control" placeholder=""
                            value="{{ date('Y-m-d') }}" />

                    </div>

                    <div class="form-group">
                        <label for="published_till">Published Till</label>
                        <input name="published_till" id="published_till" type="date" class="form-control" placeholder=""
                            value="{{ date('Y-m-d') }}" />
                    </div>
                    @if ($report_type == 'dynamic')
                        <div class="mt-5 mb-3">
                            <h4>Select Fields</h4>
                        </div>
                        @foreach ($fields as $field)
                            <input type="checkbox" name="fields_list[]" value="{{ $field }}">
                            {{ $field }} <br>
                        @endforeach

                    @elseif ($report_type == "static")
                        <div class="form-group">
                            <input type="radio" name="report1" value="{{ old('report1') }}">
                            <label>Report 1</label>
                            <input type="radio" name="report1" value="{{ old('report1') }}">
                            <label>Report 2</label>
                        </div>

                    @endif
                    <input type="hidden" name="report_type" value="{{ $report_type }}">
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Generate Report</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
