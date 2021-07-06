<?php

namespace App\Services;


use App\Models\User;

class CalendarService
{
    /**
     * @return false|string
     */
    public static function getEvents()
    {
        $users = User::whereNotNull('birth_date')->get();
        $items = [];
        foreach ($users as $item) {
            $icon = "<i class='icon-calendar2 _calendar-icon'></i> ";
            $items[] = [
                'title' => $icon . ' ' . $item->name,
                'start' => $item->birth_date->format('Y-m-d H:i:s'),
                'end' => $item->birth_date->format('Y-m-d H:i:s'),
                'id' => $item->id,
            ];
        }

        $items = json_encode($items, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
        return $items;
    }


}


