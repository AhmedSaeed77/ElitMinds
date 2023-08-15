<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AllSetting extends Model
{
    
    protected $table = 'all_settings';
    protected $fillable = [
                            'experts',
                            'certificates',
                            'achieve',
                            'books',
                            'assessment',
                            'educational',
                            'contactus',
                            'allcertificates',
                            'allbooks',
                            'wehelp',
                            'vision',
                            'mission',
                            'title1',
                            'title2',
                            'title3',
                            'story',
                            'achievename1',
                            'achievename2',
                            'achievename3',
                            'achievename4',
                            'achievedesc1',
                            'achievedesc2',
                            'achievedesc3',
                            'achievedesc4',
                            'allblog',
                            'videohome',
                            'certificatemainimage',
                            'blogmainimage',
                            'twiterlink',
                            'facebooklink',
                            'youtubelink',
                            'instalink',
                            'wifilink',
                            'linkedinlink',
                        ];
}
