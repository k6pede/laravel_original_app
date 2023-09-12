REmemo運営事務局です。
{{$user_info['user_name']}}様、こんにちは。
来月のご予定をお知らせします！

====================================
{{$nextmonth_and_year['yearOfNextMonth']}}年 {{$nextmonth_and_year['nextmonth']}}月のご予定
====================================

@foreach ($events as $event)
[日時] {{$event->start_at->format('m月d日 H:i')}}〜
[内容] {{$event->title}}

------------------------------
 @endforeach 

====================================




いつもREmemoをご利用いただき、ありがとうございます。
ご不明点やお問い合わせは、運営事務局までお気軽にご連絡ください。
REmemoアプリURL
-> https://rememo-app.com


※詳しい内容や変更は、REmemoアプリページでご確認ください。
※本メールは送信専用アドレスです。ご返信ができませんのでご注意ください。

配信元 REmemo運営事務局
