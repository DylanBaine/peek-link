<x-render-wrapper>
    <div style="width: 100%;
    height: 100%;
    position: relative;
    display: flex;
    padding: 20px;
    ">
        <div style="width: 50%; display: flex; align-items: center;">
            <img style="
            width: 100%;
            border-radius: 12px;
            box-shadow: 1px 2px 20px black;
            "
                src="/api/v2/image.png?url={{ $url }}" alt="" srcset="">
        </div>
        <div style="width: 50%; display: flex; align-items: center; justify-content: center;">
            <div style="text-align: center;">
                <h1 style="font-weight: bold; font-size: 3em;">READ MORE</h1>
                {{-- <button
                    style="
                    margin-top: -42px;
                    background: black;
                    bottom: 40px;
                    color: white;
                    font-size: 2em;
                    padding: .5em 1em;
                    font-weight: bold;
                    outline: none;
                    border-radius: .5em;
                    border: none;
                    ">
                    {{ $domain }}
                </button> --}}
            </div>
        </div>
    </div>
</x-render-wrapper>
