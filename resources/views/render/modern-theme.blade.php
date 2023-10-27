<x-render-wrapper>
    <div style="width: 100%;
    height: 100%;
    position: relative;">
        <div
            style="
            background: url('/api/v2/image.png?url={{ $url }}');
            background-size: cover;
            width: 100%;
            height: 100%;
            ">
        </div>
        <div
            style="
        position: absolute;
        bottom: 15%;
        text-align: center;
        width: 100%;
        z-index: 999;
        ">
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

        <div
            style="position: absolute;
                bottom: 0;
                width: 100%;
                background: linear-gradient(0deg, rgba(0, 0, 0, .8) 10%, transparent);
                height: 40%;
                z-index: 1;
                ">
        </div>
    </div>
</x-render-wrapper>
