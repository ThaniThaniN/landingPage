<x-admin-layout>
    <h2>This is the dashboard... Such Empty :)</h2>
    @auth
        {{" You are logged in! "}}
    @endauth
    @guest
        {{" You are not logged in! "}}
    @endguest
</x-admin-layout>
