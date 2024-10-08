<?php

use App\Livewire\DatabaseSelector;
use App\Models\Utility\GameServer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Session;
use Livewire\Livewire;

uses(RefreshDatabase::class)->in(__DIR__);

beforeEach(function () {
    GameServer::factory()->create([
        'id' => 1,
        'name' => 'Server 1',
        'experience_rate' => 1,
        'is_active' => true,
        'connection_name' => 'server_1',
    ]);

    GameServer::factory()->create([
        'id' => 2,
        'name' => 'Server 2',
        'experience_rate' => 2,
        'is_active' => true,
        'connection_name' => 'server_2',
    ]);

    GameServer::factory()->create([
        'id' => 3,
        'name' => 'Inactive Server',
        'experience_rate' => 3,
        'is_active' => false,
        'connection_name' => 'inactive_server',
    ]);
});

it('renders the DatabaseSelector component', function () {
    Livewire::test(DatabaseSelector::class)
        ->assertViewIs('livewire.database-selector');
});

it('sets server options and selected server ID on mount', function () {
    $component = Livewire::test(DatabaseSelector::class);

    expect($component->get('serverOptions'))->toHaveCount(2)
        ->and($component->get('selectedServerId'))->toBe(1);
});

it('uses session value for selected server ID if available on mount', function () {
    Session::put('selected_server_id', 2);

    $component = Livewire::test(DatabaseSelector::class);

    expect($component->get('selectedServerId'))->toBe(2);
});

it('updates the selected server ID and session on updateServer call', function () {
    $component = Livewire::test(DatabaseSelector::class)
        ->call('updateServer', 2);

    expect($component->get('selectedServerId'))->toBe(2)
        ->and(Session::get('selected_server_id'))->toBe(2)
        ->and(Session::get('game_db_connection'))->toBe('server_2');
});

it('sends a notification on updateServer call', function () {
    Livewire::test(DatabaseSelector::class)
        ->call('updateServer', 2)
        ->assertNotified();
});

it('redirects to the referrer URL and updates session on updateServer call', function () {
    $referer = 'http://example.com/previous-page';

    Livewire::test(DatabaseSelector::class)
        ->call('updateServer', 2, $referer)
        ->assertRedirect($referer);

    expect(session('selected_server_id'))->toBe(2)
        ->and(session('game_db_connection'))->toBe('server_2');
});

it('returns only active servers in getServerOptions', function () {
    $component = Livewire::test(DatabaseSelector::class);

    $serverOptions = $component->get('serverOptions');

    expect($serverOptions)->toHaveCount(2)
        ->and($serverOptions)->toHaveKey(1)
        ->and($serverOptions)->toHaveKey(2)
        ->and($serverOptions)->not->toHaveKey(3);
});

it('formats server information correctly in getServerOptions', function () {
    $component = Livewire::test(DatabaseSelector::class);

    $serverOptions = $component->get('serverOptions');

    expect($serverOptions[1])->toBe([
        'name' => 'Server 1',
        'experience_rate' => 1.0,
    ]);
});
