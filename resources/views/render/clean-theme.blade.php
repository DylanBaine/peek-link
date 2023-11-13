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
            style="position: absolute;
                bottom: 0;
                width: 100%;
                background: linear-gradient(0deg, rgba(0, 0, 0, .5) 10%, transparent);
                height: 20%;
                z-index: 1;
                ">
        </div>
    </div>
</x-render-wrapper>
