<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ContentBasedFilter extends Model
{
    protected $primaryKey = 'cf_id';

    protected $building_details = [];
    protected $hargaTermahal = 100;
    protected $hargaWeight;
    protected $building_types;
    protected $cities;
    protected $kkWeight;
    protected $tipeWeight;


    public function __construct(array $building_details)
    {
        $this->building = $building_details;
        $this->hargaTermahal = max(array_column($building_details, 'harga'));  
    }

    public function storeContentFiltering($data)
    {
        DB::table('content_filtering')->insert($data);
    }

    public function setCities(float $cities): void
    {
        $this->kotakabu = $cities;
    }

    public function setTipe(float $tipe): void
    {
        $this->tipeBangunan = $tipe;
    }

    public function calculateSimiliaritiesMatrix(): array
    {
        $matrix = [];

        foreach ($this->building as $building)
        {
            $similiarities = [];

            foreach ($this->building as $_building)
            {
                if ($building['building_id'] === $_building['building_id'])
                {
                    continue;
                }
                $similiarities['building_id' . $_building['building_id']] = $this->calculateSimiliarities($building, $_building);
            }
            $matrix['building_id_' . $building['building_id']] = $similiarities;
        }
        return $matrix;
    }

    public function getBuildingBySimiliarities($buildingId, array $matrix): array
    {
        $similiarities = $matrix['bangunan_id_' . $buildingId] ?? null;
        $sortBangunan = [];

        if (is_null($similiarities))
        {
            throw new Exception('Bangunan dengan ID tersebut tidak ditemukan..');
        }

        arsort($similiarities);
        foreach ($similiarities as $buildingIdKey => $similarity)
        {
            $id = intval(str_replace('building_id_', '', $buildingIdKey));
            $buildings = array_filter($this->buildings, function ($building) use($id)
            {
                return $building['building_id'] === $id;
            });
            if (! count($buildings))
            {
                continue;
            }

            $building = $buildings[array_keys($buildings)[0]];
            $building['similarity'] = $similarity;
            $sortedbuildings[] = $building;
        }
        return $sortedbuildings;
    }

    protected function calculateSimilarity($buildingA, $buildingB)
    {
        return array_sum(
            [
                (Similarity::eucliden(
                    Similarity::minMaxNorm([$buildingA['harga']], $this->hargaTermahal),
                    Similarity::minMaxNorm([$buildingB['harga']], $this->hargaTermahal)
                ) * $this->hargaWeight),
                (Similarity::jaccard($buildingA['nama_kk'], $buildingB['nama_kk']) * $this->kkWeight),
                (Similarity::jaccard($buildingA['nama_tipe'], $buildingB['nama_tipe']) * $this->tipeWeight)
            ]) / ($this->kkWeight + $this->hargaWeight + $this->tipeWeight);
    }
}
