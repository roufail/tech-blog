<div {{ $attributes }}>
    osama is here {{ $slot }}

    <div class="child">
        {{ $childData }}
    </div>

    {{ $exampleData }}<br />

    {{ $public_var }}

    @foreach ($users as $user)
    {{  $user->name }}<br />
    @endforeach
</div>
