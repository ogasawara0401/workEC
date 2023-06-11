<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      カート
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          @if (count($likes) > 0)
            @foreach ($likes as $like)
              <div class="md:flex md:items-center mb-2">
                <div class="md:w-3/12">
                  @if ($like->imageFirst->filename !== null)
                    <img src="{{ asset('storage/products/' . $like->imageFirst->filename) }}">
                  @else
                    <img src="">
                  @endif
                </div>
                <div class="md:w-3/12 md:ml-2">{{ $like->name }}</div>
                <div class="md:w-3/12 flex justify-around">
                  <div>{{ number_format($like->price) }}<span class="text-sm text-gray-700">円(税込)</span></div>
                </div>
                <div class="md:w-3/12">
                  <button onclick="location.href='{{ route('user.items.show', ['item' => $like->id]) }}'"
                    class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">
                    商品ページを見る
                  </button>
                </div>
              </div>
            @endforeach
            <div class="my-2">
            @else
              いいねした商品はありません。
          @endif
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
