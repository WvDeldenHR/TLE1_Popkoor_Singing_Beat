<div class="container">
        <form action="#" method="GET">
            <input class="form-control mb-4 w-25" type="text" name="search" placeholder="Search"
                   value="{{request('search')}}">
            <button class="btn btn-primary mb-2" type="submit">Search</button>
            </input>
            <button class="btn btn-light mb-2" type="submit" name="sort" value="A-Z">
                <svg width='24' height='24' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg'
                     xmlns:xlink='http://www.w3.org/1999/xlink'>
                    <rect width='24' height='24' stroke='none' fill='#000000' opacity='0'/>
                    <g transform="matrix(1 0 0 1 12 12)">
                        <path
                            style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;"
                            transform=" translate(-12.5, -12)"
                            d="M 6.8007812 2 L 4 10 L 6 10 L 6.3652344 9 L 8.6308594 9 L 9 10 L 11 10 L 8.1992188 2 L 6.8007812 2 z M 16 2 L 16 18 L 13 18 L 17 22 L 21 18 L 18 18 L 18 2 L 16 2 z M 7.546875 5.2636719 L 8.0664062 7 L 6.9335938 7 L 7.546875 5.2636719 z M 4 13 L 4 15 L 8 15 L 4 19.5625 L 4 21 L 11 21 L 11 19 L 7 19 L 11 14.419922 L 11 13 L 4 13 z"
                            stroke-linecap="round"/>
                    </g>
                </svg>
            </button>
            <button class="btn btn-light mb-2" type="submit" name="sort" value="Z-A">
                <svg width='24' height='24' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg'
                     xmlns:xlink='http://www.w3.org/1999/xlink'>
                    <rect width='24' height='24' stroke='none' fill='#000000' opacity='0'/>
                    <g transform="matrix(1 0 0 1 12 12)">
                        <path
                            style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;"
                            transform=" translate(-12.5, -12)"
                            d="M 4 2 L 4 4 L 8 4 L 4 8.5625 L 4 10 L 11 10 L 11 8 L 7 8 L 11 3.4199219 L 11 2 L 4 2 z M 16 2 L 16 18 L 13 18 L 17 22 L 21 18 L 18 18 L 18 2 L 16 2 z M 6.8007812 13 L 4 21 L 6 21 L 6.3652344 20 L 8.6308594 20 L 9 21 L 11 21 L 8.1992188 13 L 6.8007812 13 z M 7.546875 16.263672 L 8.0664062 18 L 6.9335938 18 L 7.546875 16.263672 z"
                            stroke-linecap="round"/>
                    </g>
                </svg>
            </button>
        </form>
</div>