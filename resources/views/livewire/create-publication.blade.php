<div class="container">
    <div class="row">
        <div class="col-7 m-auto">



            <form action="/publications" method="post" class="col-lg-7">
                @csrf

                <div class="form-group">
                    <label for="category">Category</label>
                    <select wire:model="selectedCategory" name="category" value="{{ old('category') }}"
                        class="form-control" id="category">
                        <option value="none"></option>
                        <option value="journal">Journal</option>
                        <option value="conference">Conference Paper</option>
                        <option value="thesis">Thesis</option>
                        <option value="chapter">Book Chapter</option>
                        <option value="book">Book</option>
                        <option value="patent">Patent</option>

                    </select>
                    @error('category')
                        <p style="color: red">{{ $message }}</p>
                    @enderror
                </div>


                @if (in_array($selectedCategory, ['journal', 'conference', 'thesis', 'chapter', 'book', 'patent']))

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}"
                            placeholder="Enter Title">
                        @error('title')
                            <p style="color: red">{{ $message }}</p>
                        @enderror
                    </div>
                    @if (!($selectedCategory == 'patent'))
                        <div class="form-group">
                            <label for="authors">Authors</label>
                            <input type="text" class="form-control" id="authors" name="authors"
                                value="{{ old('authors') }}" placeholder="Enter Authors' names seperated by comma">
                            @error('authors')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>
                    @else
                        <div class="form-group">
                            <label for="inventors">Inventors</label>
                            <input type="text" class="form-control" id="inventors" name="inventors"
                                value="{{ old('inventors') }}" placeholder="Enter Inventors">
                            @error('inventors')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>
                    @endif


                    <div class="form-group">
                        <label for="published_in">Published In</label>
                        <input min="1960-01-01" name="published_in" id="published_in" type="date" class="form-control"
                            placeholder="" value="{{ date('Y-m-d') }}" />
                        @error('published_in')
                            <p style="color: red">{{ $message }}</p>
                        @enderror
                    </div>


                    @if ($selectedCategory == 'journal')
                        <div class="form-group">
                            <label for="journal">Journal</label>
                            <input type="text" class="form-control" id="journal" name="journal"
                                value="{{ old('journal') }}" placeholder="Enter Journal name">
                            @error('journal')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>
                    @endif

                    @if ($selectedCategory == 'conference')
                        <div class="form-group">
                            <label for="conference">Conference</label>
                            <input type="text" class="form-control" id="conference" name="conference"
                                value="{{ old('conference') }}" placeholder="Enter Conference name">
                            @error('conference')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>
                    @endif

                    @if ($selectedCategory == 'chapter')
                        <div class="form-group">
                            <label for="book">Book</label>
                            <input type="text" class="form-control" id="book" name="book" value="{{ old('book') }}"
                                placeholder="Enter Book name">
                            @error('book')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>
                    @endif

                    @if (in_array($selectedCategory, ['journal', 'conference', 'chapter', 'book']))
                        <div class="form-group">
                            <label for="volume">Volume</label>
                            <input type="text" name="volume" class="form-control" id="volume" placeholder="">
                            @error('volume')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="pages">Pages</label>
                            <input type="text" class="form-control" id="pages" name="pages" placeholder="">
                            @error('pages')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>
                    @endif

                    @if (in_array($selectedCategory, ['journal', 'conference']))
                        <div class="form-group">
                            <label for="issue">Issue</label>
                            <input type="text" class="form-control" id="issue" name="issue"
                                placeholder="Enter Issue number">
                        </div>
                    @endif

                    @if (!in_array($selectedCategory, ['thesis', 'patent']))
                        <div class="form-group">
                            <label for="publisher">Publisher</label>

                            <input type="text" class="form-control" id="publisher" name="publisher"
                                value="{{ old('publisher') }}" placeholder="">

                        </div>
                    @endif

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary ">Submit</button>
                    </div>
                @endif

            </form>
        </div>
    </div>


</div>
