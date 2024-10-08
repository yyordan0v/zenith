<?php

namespace App\Enums\Game;

use Filament\Support\Contracts\HasLabel;

enum Map: int implements HasLabel
{
    case Lorencia = 0;
    case Dungeon = 1;
    case Devias = 2;
    case Noria = 3;
    case LostTower = 4;
    case Exile = 5;
    case VIPArena = 6;
    case Atlans = 7;
    case Tarkan = 8;
    case DevilSquareI_IV = 9;
    case Icarus = 10;
    case BloodCastleI = 11;
    case BloodCastleII = 12;
    case BloodCastleIII = 13;
    case BloodCastleIV = 14;
    case BloodCastleV = 15;
    case BloodCastleVI = 16;
    case BloodCastleVII = 17;
    case ChaosCastleI = 18;
    case ChaosCastleII = 19;
    case ChaosCastleIII = 20;
    case ChaosCastleIV = 21;
    case ChaosCastleV = 22;
    case ChaosCastleVI = 23;
    case KalimaI = 24;
    case KalimaII = 25;
    case KalimaIII = 26;
    case KalimaIV = 27;
    case KalimaV = 28;
    case KalimaVI = 29;
    case ValleyOfLoren = 30;
    case LandOfTrial = 31;
    case DevilSquareV_VI = 32;
    case Aida = 33;
    case CryWolf = 34;
    case KalimaVII = 36;
    case Kanturu = 37;
    case KanturuRuins = 38;
    case KanturuTower = 39;
    case Mayhem = 40;
    case RefugeOfBalgass = 41;
    case BarracksOfBalgass = 42;
    case IllusionTempleI = 45;
    case IllusionTempleII = 46;
    case IllusionTempleIII = 47;
    case IllusionTempleIV = 48;
    case IllusionTempleV = 49;
    case IllusionTempleVI = 50;
    case Elbeland = 51;
    case BloodCastleVIII = 52;
    case ChaosCastleVII = 53;
    case SwampOfPeace = 56;
    case LaCleon = 57;
    case LaCleonHatchery = 58;
    case SantaVillage = 62;
    case Vulcanus = 63;
    case DuelArena = 64;
    case DoppelGangerI = 65;
    case DoppelGangerII = 66;
    case DoppelGangerIII = 67;
    case DoppelGangerIV = 68;
    case ImperialGuardianI = 69;
    case ImperialGuardianII = 70;
    case ImperialGuardianIII = 71;
    case ImperialGuardianIV = 72;
    case LorenMarket = 79;
    case Karutan = 80;
    case Karutan2 = 81;
    case ElHarath = 82;
    case VIPArena2 = 83;
    case Ultoria = 84;
    case Ashkavor = 85;
    case Dungeon2 = 86;
    case Icewrack = 89;
    case Yoskreth = 90;
    case EventSquare = 91;
    case Acheron2 = 92;
    case Debenter = 95;
    case Debenter2 = 96;
    case ChaosCastleBattle = 97;
    case IllusionTempleLeague = 98;
    case IllusionTempleLeague2 = 99;
    case UrkMountain = 100;
    case UrkMountain2 = 101;
    case TormentedSquareOfTheFittest = 102;
    case TormentedSquareBattleI = 103;
    case TormentedSquareBattleII = 104;
    case TormentedSquareBattleIII = 105;
    case TormentedSquareBattleIV = 106;
    case Nars = 110;
    case Ferea = 112;
    case NixieLake = 113;
    case DeepDungeon1 = 116;
    case DeepDungeon2 = 117;
    case DeepDungeon3 = 118;
    case DeepDungeon4 = 119;
    case DeepDungeon5 = 120;
    case SwampOfDarkness = 122;
    case KuberaMineArea1 = 123;
    case AbyssOfAtlas1 = 128;
    case AbyssOfAtlas2 = 129;
    case AbyssOfAtlas3 = 130;
    case ScorchedCanyon = 131;
    case RedSmokeIcarus = 132;
    case ArenilTemple = 133;
    case GrayAida = 134;
    case OldKethotum = 135;
    case BurningKethotum = 136;

    public function getLabel(): string
    {
        return match ($this) {
            self::Lorencia => 'Lorencia',
            self::Dungeon => 'Dungeon',
            self::Devias => 'Devias',
            self::Noria => 'Noria',
            self::LostTower => 'Lost Tower',
            self::Exile => 'Exile',
            self::VIPArena => 'VIP Arena',
            self::Atlans => 'Atlans',
            self::Tarkan => 'Tarkan',
            self::DevilSquareI_IV => 'Devil Square I-IV',
            self::Icarus => 'Icarus',
            self::BloodCastleI => 'Blood Castle I',
            self::BloodCastleII => 'Blood Castle II',
            self::BloodCastleIII => 'Blood Castle III',
            self::BloodCastleIV => 'Blood Castle IV',
            self::BloodCastleV => 'Blood Castle V',
            self::BloodCastleVI => 'Blood Castle VI',
            self::BloodCastleVII => 'Blood Castle VII',
            self::ChaosCastleI => 'Chaos Castle I',
            self::ChaosCastleII => 'Chaos Castle II',
            self::ChaosCastleIII => 'Chaos Castle III',
            self::ChaosCastleIV => 'Chaos Castle IV',
            self::ChaosCastleV => 'Chaos Castle V',
            self::ChaosCastleVI => 'Chaos Castle VI',
            self::KalimaI => 'Kalima I',
            self::KalimaII => 'Kalima II',
            self::KalimaIII => 'Kalima III',
            self::KalimaIV => 'Kalima IV',
            self::KalimaV => 'Kalima V',
            self::KalimaVI => 'Kalima VI',
            self::ValleyOfLoren => 'Valley of Loren',
            self::LandOfTrial => 'Land of Trial',
            self::DevilSquareV_VI => 'Devil Square V-VI',
            self::Aida => 'Aida',
            self::CryWolf => 'Cry Wolf',
            self::KalimaVII => 'Kalima VII',
            self::Kanturu => 'Kanturu',
            self::KanturuRuins => 'Kanturu Ruins',
            self::KanturuTower => 'Kanturu Tower',
            self::Mayhem => 'Mayhem',
            self::RefugeOfBalgass => 'Refuge of Balgass',
            self::BarracksOfBalgass => 'Barracks of Balgass',
            self::IllusionTempleI => 'Illusion Temple I',
            self::IllusionTempleII => 'Illusion Temple II',
            self::IllusionTempleIII => 'Illusion Temple III',
            self::IllusionTempleIV => 'Illusion Temple IV',
            self::IllusionTempleV => 'Illusion Temple V',
            self::IllusionTempleVI => 'Illusion Temple VI',
            self::Elbeland => 'Elbeland',
            self::BloodCastleVIII => 'Blood Castle VIII',
            self::ChaosCastleVII => 'Chaos Castle VII',
            self::SwampOfPeace => 'Swamp of Peace',
            self::LaCleon => 'La Cleon',
            self::LaCleonHatchery => 'La Cleon Hatchery',
            self::SantaVillage => 'Santa Village',
            self::Vulcanus => 'Vulcanus',
            self::DuelArena => 'Duel Arena',
            self::DoppelGangerI => 'Doppel Ganger',
            self::DoppelGangerII => 'Doppel Ganger',
            self::DoppelGangerIII => 'Doppel Ganger',
            self::DoppelGangerIV => 'Doppel Ganger',
            self::ImperialGuardianI => 'Imperial Guardian',
            self::ImperialGuardianII => 'Imperial Guardian',
            self::ImperialGuardianIII => 'Imperial Guardian',
            self::ImperialGuardianIV => 'Imperial Guardian',
            self::LorenMarket => 'Loren Market',
            self::Karutan => 'Karutan',
            self::Karutan2 => 'Karutan 2',
            self::ElHarath => 'El Harath',
            self::VIPArena2 => 'VIP Arena 2',
            self::Ultoria => 'Ultoria',
            self::Ashkavor => 'Ashkavor',
            self::Dungeon2 => 'Dungeon 2',
            self::Icewrack => 'Icewrack',
            self::Yoskreth => 'Yoskreth',
            self::EventSquare => 'Event Square',
            self::Acheron2 => 'Acheron 2',
            self::Debenter => 'Debenter',
            self::Debenter2 => 'Debenter 2',
            self::ChaosCastleBattle => 'Chaos Castle Battle',
            self::IllusionTempleLeague => 'Illusion Temple League',
            self::IllusionTempleLeague2 => 'Illusion Temple League 2',
            self::UrkMountain => 'Urk Mountain',
            self::UrkMountain2 => 'Urk Mountain 2',
            self::TormentedSquareOfTheFittest => 'Tormented Square of the Fittest',
            self::TormentedSquareBattleI => 'Tormented Square Battle',
            self::TormentedSquareBattleII => 'Tormented Square Battle',
            self::TormentedSquareBattleIII => 'Tormented Square Battle',
            self::TormentedSquareBattleIV => 'Tormented Square Battle',
            self::Nars => 'Nars',
            self::Ferea => 'Ferea',
            self::NixieLake => 'Nixie Lake',
            self::DeepDungeon1 => 'Deep Dungeon 1',
            self::DeepDungeon2 => 'Deep Dungeon 2',
            self::DeepDungeon3 => 'Deep Dungeon 3',
            self::DeepDungeon4 => 'Deep Dungeon 4',
            self::DeepDungeon5 => 'Deep Dungeon 5',
            self::SwampOfDarkness => 'Swamp of Darkness',
            self::KuberaMineArea1 => 'Kubera Mine Area 1',
            self::AbyssOfAtlas1 => 'Abyss of Atlas 1',
            self::AbyssOfAtlas2 => 'Abyss of Atlas 2',
            self::AbyssOfAtlas3 => 'Abyss of Atlas 3',
            self::ScorchedCanyon => 'Scorched Canyon',
            self::RedSmokeIcarus => 'Red Smoke Icarus',
            self::ArenilTemple => 'Arenil Temple',
            self::GrayAida => 'Gray Aida',
            self::OldKethotum => 'Old Kethotum',
            self::BurningKethotum => 'Burning Kethotum',
        };
    }
}
