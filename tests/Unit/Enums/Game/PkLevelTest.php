<?php

use App\Enums\Game\PkLevel;
use Filament\Support\Contracts\HasLabel;

it('has the correct number of enum cases', function () {
    expect(PkLevel::cases())->toHaveCount(6);
});

it('has the correct enum values and labels', function () {
    $expectedLevels = [
        'Hero' => ['value' => 1, 'label' => 'Hero'],
        'Commoner' => ['value' => 2, 'label' => 'Commoner'],
        'Normal' => ['value' => 3, 'label' => 'Normal'],
        'AgainstMurderer' => ['value' => 4, 'label' => 'Against Murderer'],
        'Murderer' => ['value' => 5, 'label' => 'Murderer'],
        'Phonomania' => ['value' => 6, 'label' => 'Phonomania'],
    ];

    foreach ($expectedLevels as $levelName => $details) {
        $level = constant(PkLevel::class.'::'.$levelName);
        expect($level->value)->toBe($details['value'])
            ->and($level->getLabel())->toBe($details['label']);
    }
});

it('implements necessary interfaces', function () {
    expect(class_implements(PkLevel::class))->toContain(HasLabel::class);
});

it('returns the correct label for each level', function () {
    expect(PkLevel::Hero->getLabel())->toBe('Hero')
        ->and(PkLevel::Commoner->getLabel())->toBe('Commoner')
        ->and(PkLevel::Normal->getLabel())->toBe('Normal')
        ->and(PkLevel::AgainstMurderer->getLabel())->toBe('Against Murderer')
        ->and(PkLevel::Murderer->getLabel())->toBe('Murderer')
        ->and(PkLevel::Phonomania->getLabel())->toBe('Phonomania');
});
