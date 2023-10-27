<x-render-wrapper>
    <div style="width: 100%;
    height: 100%;
    position: relative;
    display: flex;
    ">
        <div style="width: 50%; display: flex; align-items: center;">
            <img style="width: 100%;" src="/api/v2/image.png?url={{ $url }}" alt="" srcset="">
        </div>
        <div style="width: 50%; display: flex; align-items: center; justify-content: center;">
            <div style="text-align: center;">
                <h1 style="font-weight: bold; font-size: 3em;">{{ $domain }}</h1>
                <button
                    style="
                    background: black;
                    bottom: 40px;
                    color: white;
                    font-size: 2em;
                    padding: .8em 1.6em;
                    font-weight: bold;
                    outline: none;
                    border-radius: .5em;
                    border: none;
                    ">
                    READ MORE
                </button>
            </div>
        </div>
    </div>
</x-render-wrapper>
