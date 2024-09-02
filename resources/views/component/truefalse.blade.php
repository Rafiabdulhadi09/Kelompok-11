 @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $item)
                    <li>{{ $item }}</li>
                @endforeach
              </ul>
            </div>
@endif
@if (Session::has('success'))
                  <div calss='pt-3'>
                    <div class="alert alert-success">
                      {{ Session::get('success') }}
                    </div>
                  </div>
@endif