<?php 
ob_start();
define('API_KEY','YOUR BOT TOKEN'); //Enter your bot's token here
$admin = "ADMIN ID"; //Enter admin's numerical id
$zirmajmue = 4; //Number of refferals to become VIP
$botusername = "YOURBOT"; //Bot's Username
$channelusername = "YOURCHANNEL"; //Bot's channel's username


function bot($method,$datas=[]){
$url = "https://api.telegram.org/bot".API_KEY."/".$method;
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
$res = curl_exec($ch);
if(curl_error($ch)){
var_dump(curl_error($ch));
}else{
return json_decode($res);
}
}
function check_channel_member($channelusername , $chat_id){
$res = bot("getChatMember" , array("chat_id" => $channelusername , "user_id" => $chat_id));
if(isset($res->result->user) && $res->result->status == "member"){
return "yes";
}elseif($res->result->status == "administrator"){
return "yes";
}elseif($res->result->status == "creator"){
return "yes";
}else{
return "no";
}
}
function SendMessage($chatid,$text,$parsmde,$disable_web_page_preview,$keyboard){
bot('sendMessage',[
'chat_id'=>$chatid,
'text'=>$text,
'parse_mode'=>$parsmde,
'disable_web_page_preview'=>$disable_web_page_preview,
'reply_markup'=>$keyboard
]);
}
function SendMessage2($chatid,$text,$message_id,$parsmde,$disable_web_page_preview,$keyboard){
bot('sendMessage',[
'chat_id'=>$chatid,
'text'=>$text,
'reply_to_message_id'=>$message_id,
'parse_mode'=>$parsmde,
'disable_web_page_preview'=>$disable_web_page_preview,
'reply_markup'=>$keyboard
]);
}
function ForwardMessage($chatid,$from_chat,$message_id){
bot('ForwardMessage',[
'chat_id'=>$chatid,
'from_chat_id'=>$from_chat,
'message_id'=>$message_id
]);
}
function SendPhoto($chatid,$photo,$keyboard,$caption){
bot('SendPhoto',[
'chat_id'=>$chatid,
'photo'=>$photo,
'caption'=>$caption,
'reply_markup'=>$keyboard
]);
}
function SendAudio($chatid,$audio,$keyboard,$caption,$sazande,$title){
bot('SendAudio',[
'chat_id'=>$chatid,
'audio'=>$audio,
'caption'=>$caption,
'performer'=>$sazande,
'title'=>$title,
'reply_markup'=>$keyboard
]);
}
function save($filename,$TXTdata) 
{ 
$myfile = fopen($filename, "w") or die("Unable to open file!"); 
fwrite($myfile, "$TXTdata"); 
fclose($myfile); 
}
function SendDocument($chatid,$document,$keyboard,$caption){
bot('SendDocument',[
'chat_id'=>$chatid,
'document'=>$document,
'caption'=>$caption,
'reply_markup'=>$keyboard
]);
}
function SendSticker($chatid,$sticker,$keyboard){
bot('SendSticker',[
'chat_id'=>$chatid,
'sticker'=>$sticker,
'reply_markup'=>$keyboard
]);
}
function SendVideo($chatid,$video,$keyboard,$duration){
bot('SendVideo',[
'chat_id'=>$chatid,
'video'=>$video,
'duration'=>$duration,
'reply_markup'=>$keyboard
]);
}
function SendVoice($chatid,$voice,$keyboard,$caption){
bot('SendVoice',[
'chat_id'=>$chatid,
'voice'=>$voice,
'caption'=>$caption,
'reply_markup'=>$keyboard
]);
}
function SendContact($chatid,$first_name,$phone_number,$keyboard){
bot('SendContact',[
'chat_id'=>$chatid,
'first_name'=>$first_name,
'phone_number'=>$phone_number,
'reply_markup'=>$keyboard
]);
}
function SendChatAction($chatid,$action){
bot('sendChatAction',[
'chat_id'=>$chatid,
'action'=>$action
]);
}
function KickChatMember($chatid,$user_id){
bot('kickChatMember',[
'chat_id'=>$chatid,
'user_id'=>$user_id
]);
}
function LeaveChat($chatid){
bot('LeaveChat',[
'chat_id'=>$chatid
]);
}
function GetChat($chatid){
bot('GetChat',[
'chat_id'=>$chatid
]);
}
function GetChatMembersCount($chatid){
bot('getChatMembersCount',[
'chat_id'=>$chatid
]);
}
function GetChatMember($chatid,$userid){
$truechannel = json_decode(file_get_contents('https://api.telegram.org/bot'.API_KEY."/getChatMember?chat_id=".$chatid."&user_id=".$userid));
$tch = $truechannel->result->status;
return $tch;
}
function AnswerCallbackQuery($callback_query_id,$text,$show_alert){
bot('answerCallbackQuery',[
'callback_query_id'=>$callback_query_id,
'text'=>$text,
'show_alert'=>$show_alert
]);
}
function EditMessageText($chat_id,$message_id,$text,$parse_mode,$disable_web_page_preview,$keyboard){
bot('editMessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>$text,
'parse_mode'=>$parse_mode,
'disable_web_page_preview'=>$disable_web_page_preview,
'reply_markup'=>$keyboard
]);
}
function EditMessageCaption($chat_id,$message_id,$caption,$keyboard,$inline_message_id){
bot('editMessageCaption',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'caption'=>$caption,
'reply_markup'=>$keyboard,
'inline_message_id'=>$inline_message_id
]);
}
function run($id,$code){
if(!is_dir("global")){
mkdir("global");
}
if(!is_dir("global/$id")){
mkdir("global/$id");
}
file_put_contents("global/$id/run.txt",$code);
}
//=============
$update = json_decode(file_get_contents('php://input'));
$chatid = $update->message->chat->id;
$fromid = $update->message->from->id;
$usrn = $update->message->chat->username;
$usrn1 = $update->message->from->username;
$messageid = $update->message->message_id;
$sticker = $update->message->sticker;
$gif = $update->message->gif;
$data_id = $update->callback_query->id;
$txt = $update->callback_query->message->text;
$chat_id = $update->message->chat->id;
$from_id = $update->message->from->id;
$from_username = $update->message->from->username;
$from_first = $update->message->from->first_name;
$forward_id = $update->message->forward_from->id;
$forward_chat = $update->message->forward_from_chat;
$forward_chat_username = $update->message->forward_from_chat->username;
$forward_chat_msg_id = $update->message->forward_from_message_id;
$textmessage = $update->message->text;
$message_id = $update->message->message_id;
$stickerid = $update->message->sticker->file_id;
$videoid = $update->message->video->file_id;
$voiceid = $update->message->voice->file_id;
$fileid = $update->message->document->file_id;
$photo = $update->message->photo;
$photoid = $photo[count($photo)-1]->file_id;
$musicid = $update->message->audio->file_id;
$caption = $update->message->caption;
$allmember = file_get_contents('data/allmember.txt');
$username = $update->message->from->username;
$name = $update->message->from->first_name;
$signup = file_get_contents("user/".$from_id."/signup.txt");
$step = file_get_contents("user/".$from_id."/step.txt");
$command = file_get_contents("user/".$from_id."/command.txt");
$change = file_get_contents("user/".$from_id."/change.txt");
$randtrue = file_get_contents("user/".$from_id."/rand.txt");
@mkdir('user/'.$from_id);
$chatadd = file_get_contents("data/chat.txt");
$vips = file_get_contents("data/vips.txt");
$ban = file_get_contents("data/banlist.txt");
//=============== Admin's keys
$button_admin = json_encode(['keyboard'=>[
[['text'=>'🔙 back']],
[['text'=>'Send message to everyone'],['text'=>'Forward to everyone']],
[['text'=>'Send message to user'],['text'=>'User profile']],
[['text'=>'Delete vip'],['text'=>'Add vip']],
[['text'=>'Statistics'],['text'=>'Warn user']],
[['text'=>'Ban user'],['text'=>'Unban user']],
],'resize_keyboard'=>true]);
$button_signup = json_encode(['keyboard'=>[
[['text'=>'register']],
],'resize_keyboard'=>true]);
$button_official = json_encode(['keyboard'=>[
[['text'=>'💬 chat']],
[['text'=>'📩 support'],['text'=>'📊 profile']],
[['text'=>'🏆 VIP']],
],'resize_keyboard'=>true]);
$button_zir = json_encode(['keyboard'=>[
[['text'=>'🌐 referral link']],
[['text'=>'invited'],['text'=>'upgrade']],
[['text'=>'🔙 back']],
],'resize_keyboard'=>true]);
$button_back_chat = json_encode(['keyboard'=>[
[['text'=>'profile']],
[['text'=>'end chat']],
],'resize_keyboard'=>true]);
$button_chat = json_encode(['keyboard'=>[
[['text'=>'random chat'],['text'=>'chatroom']],
[['text'=>'👩🏻 chat with girl'],['text'=>'👱🏼 chat with boy']],
[['text'=>'🔙 back']],
],'resize_keyboard'=>true]);
$button_chat2 = json_encode(['keyboard'=>[
[['text'=>'⚠️ end chat'],['text'=>'continue chat']],
[['text'=>'⚠️ block and end chat']],
],'resize_keyboard'=>true]);
$button_chat3 = json_encode(['keyboard'=>[
[['text'=>"don't block"],['text'=>'block']],
],'resize_keyboard'=>true]);
$button_back_search = json_encode(['keyboard'=>[ 
[['text'=>'cancel search']],
],'resize_keyboard'=>true]);
$button_jens = json_encode(['keyboard'=>[
[['text'=>'female'],['text'=>'male']],
],'resize_keyboard'=>true]);
$button_einfo = json_encode(['keyboard'=>[
[['text'=>'edit']],
[['text'=>'🔙 back']],
],'resize_keyboard'=>true]);
//NOT USED
$button_pfriend = json_encode(['inline_keyboard'=>[
[['text'=>'answer','callback_data'=>'pfriend']],
[['text'=>'report','callback_data'=>'reportpf']],
],'resize_keyboard'=>true]);
$button_senn = json_encode(['keyboard'=>[
[['text' => '18'],['text' => '19'],['text' => '20'],['text' => '21'],['text' => '22'],['text' => '23'],['text' => '24']],
[['text' => '25'],['text' => '26'],['text' => '27'],['text' => '28'],['text' => '29'],['text' => '30'],['text' => '31']],
[['text' => '32'],['text' => '33'],['text' => '34'],['text' => '35'],['text' => '36'],['text' => '37'],['text' => '38']],
[['text' => '39'],['text' => '40'],['text' => '41'],['text' => '42'],['text' => '43'],['text' => '44'],['text' => '45']],
[['text' => '46'],['text' => '47'],['text' => '48'],['text' => '49'],['text' => '50'],['text' => '51'],['text' => '52']],
[['text' => '53'],['text' => '54'],['text' => '55'],['text' => '56'],['text' => '57'],['text' => '58'],['text' => '59']],
[['text' => '60'],['text' => '61'],['text' => '62'],['text' => '63'],['text' => '64'],['text' => '65'],['text' => '66']],
[['text' => '67'],['text' => '68'],['text' => '69'],['text' => '70'],['text' => '71'],['text' => '72'],['text' => '73']],
[['text' => '74'],['text' => '75'],['text' => '76'],['text' => '77'],['text' => '78'],['text' => '79'],['text' => '80']],
],'resize_keyboard'=>true]);
$button_mlife = json_encode(['keyboard'=>[ //You can edit locations
[['text'=>'Andaman and Nicobar'], ['text'=>'Andhra Pradesh'], ['text'=>'Arunachal Pradesh'], ['text'=>'Assam']],
[['text'=>'Bihar'], ['text'=>'Chandigarh'], ['text'=>'Chhattisgarh'], ['text'=>'Dadra and Nagar Haveli']],
[['text'=>'Daman and Diu'], ['text'=>'Delhi'], ['text'=>'Goa'], ['text'=>'Gujarat']],
[['text'=>'Haryana'], ['text'=>'Himachal Pradesh'], ['text'=>'Jammu and Kashmir'], ['text'=>'Jharkhand']],
[['text'=>'Karnataka'], ['text'=>'Kerala'], ['text'=>'Lakshadweep'], ['text'=>'Madhya Pradesh']],
[['text'=>'Maharashtra'], ['text'=>'Manipur'], ['text'=>'Meghalaya'], ['text'=>'Mizoram']],
[['text'=>'Nagaland'], ['text'=>'Orissa'], ['text'=>'Puducherry'], ['text'=>'Punjab']],
[['text'=>'Rajasthan'], ['text'=>'Sikkim'], ['text'=>'Tamil Nadu'], ['text'=>'Telangana']],
[['text'=>'Tripura'], ['text'=>'Uttar Pradesh'], ['text'=>'Uttarakhand'], ['text'=>'West Bengal']],
],'resize_keyboard'=>true]);
$button_back = json_encode(['keyboard'=>[
[['text'=>'🔙 back']],
],'resize_keyboard'=>true]);
$button_lagv = json_encode(['keyboard'=>[
[['text'=>'cancel']],
],'resize_keyboard'=>true]);
//==========ban
if (strpos($ban,"$from_id") !== false  ) {
SendMessage($chat_id,"You've been blocked from the bot because of not following the terms.");
return false;
}
//$inch = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=@".$channelusername."&user_id=".$from_id)); 
if(check_channel_member("@".$channelusername , $chat_id)=="no"){
SendMessage($chat_id,"Welcome
To use the bot you should first join to our channel
then press /start in bot:",'html','true',json_encode(['inline_keyboard'=>[
[['text'=>" Join the channel",'url'=>"https://telegram.me/$channelusername"]] 
],'resize_keyboard'=>true]));
return false;
}

if ($warn == '3'){
$banwarn = fopen("data/banlist.txt", "a") or die("Unable to open file!"); 
fwrite($banwarn, "$from_id\n");
fclose($banwarn);
SendMessage($chat_id,"⚠️ You have 3 warns.
You've been blocked from the bot because of not following the terms.","html","true",$button_official);
return false;
}
//=========start
elseif(preg_match('/^\/([Ss]tart)(.*)/',$textmessage)){
preg_match('/^\/([Ss]tart)(.*)/',$textmessage,$match);
$match[2] = str_replace(" ","",$match[2]);
$match[2] = str_replace("\n","",$match[2]);
if($match[2] != null){
if (strpos($allmember , "$from_id") == false){
if($match[2] != $from_id){
if (strpos($gold , "$from_id") == false){
$txxt = file_get_contents('user/'.$match[2]."/gold.txt");
$pmembersid= explode("\n",$txxt);
if (!in_array($from_id,$pmembersid)){
$aaddd = file_get_contents('user/'.$match[2]."/gold.txt");
$aaddd .= $from_id."\n";
file_put_contents('user/'.$match[2]."/gold.txt",$aaddd);
}
SendMessage($match[2],"✅ Someone just joined the bot with your referral link.","html","true");
}
}
}
}
if (!file_exists("user/$from_id/step.txt")){
save("user/$from_id/command.txt","none");
save("user/$from_id/change.txt","none");
save("user/$from_id/step.txt","none");
save("user/$from_id/signup.txt","none");
save("user/$from_id/rand.txt","none");
save("user/$from_id/mlife.txt","not defined");
save("user/$from_id/nam.txt","not defined");
save("user/$from_id/senn.txt","not defined");
save("user/$from_id/jens.txt","not defined");
SendMessage($chat_id,"Welcome.
Here you can chat with boys and girls and make some friends.

To start please press register button 👇","html","true",$button_signup);
SendMessage($admin, "یه نفر به ربات پیوست!","html", "true");
}else{
save("user/$from_id/step.txt","none");
file_put_contents("user/".$from_id."/command.txt","none");
SendMessage($chat_id,"Welcome.
Here you can chat with boys and girls and make some friends.

To start please press register button 👇","html","true",$button_official);
}
}
elseif ($textmessage == '📩 support'){
save("user/$from_id/command.txt","message-support");
SendMessage($chat_id,"We will be glad to hear your suggestions or solve your problems. Please enter your message :","html","true",$button_back);
}

elseif($textmessage == '🏆 VIP'){
SendMessage($chat_id,"To become VIP, $zirmajmue users should join the bot via your referral link.

With VIP 🏆 you can:
1. Choose the gender of your matches - girl or boy ✅
2. Get support faster ✅
3. See your matched user profile in chat ✅
4. Priority Matching - Be at the top of the queue and match quicker ✅ 

Please choose a button :","html","true",$button_zir);
}
elseif($textmessage == '🌐 referral link'){
SendMessage($chat_id,"By sharing the following message you can get referrals and become VIP 👇","html","true",$button_zir);
SendMessage($chat_id,"Hello ✋️
$name invited you to join the friends-making bot
In this bot you can randomly chat with girls and boys for free
That's not all! Join via the link and see yourself:
https://telegram.me/".$botusername."?start=$from_id ","html","true",$button_zir);
}
elseif($textmessage == 'invited'){
$gold = file_get_contents("user/".$from_id."/gold.txt");
$member_id = explode("\n",$gold);
$mmemcount = count($member_id) -1;
SendMessage($chat_id,"The number of users that joined the bot via your link is : $mmemcount 👩👨","html","true",$button_zir);
}
elseif($textmessage == 'upgrade'){
$gold = file_get_contents("user/".$from_id."/gold.txt");
$oldertega = file_get_contents("user/".$from_id."/oldertega.txt");
$member_id = explode("\n",$gold);
$mmemcount = count($member_id) -1;
if($mmemcount >= $zirmajmue){
if($oldertega != 'false'){
$ertega = fopen("data/vips.txt","a") or die("Unable to open file!"); 
fwrite($ertega,"$from_id\n");
fclose($ertega);
SendMessage($chat_id,"Congratulations!
Your account is now VIP 🏆","html","true",$button_zir);
save("user/$from_id/karbara.txt","0");
save("user/$from_id/oldertega.txt","false");
}else{
save("user/$from_id/step.txt","none");
SendMessage($chat_id,"You're already VIP 🏆!","html","true",$button_zir);
}
}else{
SendMessage($chat_id,"Dear user
To upgrade your account $zirmajmue users should join the bot via your link but only $mmemcount users have joined 😢","html","true",$button_zir);
}
}
elseif($textmessage == '📊 profile'){
$signup = file_get_contents("user/".$from_id."/signup.txt");
$nam = file_get_contents("user/".$from_id."/nam.txt");
$senn = file_get_contents("user/".$from_id."/senn.txt");
$jens = file_get_contents("user/".$from_id."/jens.txt");
$mlife = file_get_contents("user/".$from_id."/mlife.txt");
SendMessage($chat_id,"Your profile :
⭕️⭕️⭕️⭕️⭕️⭕️⭕️⭕️
name = $nam 
age = $senn 
location = $mlife
gender = $jens 
⭕️⭕️⭕️⭕️⭕️⭕️⭕️⭕️","html","true",$button_einfo);
}
elseif($textmessage == '💬 chat'){
SendMessage($chat_id,"Welcome to chat section.
Please choose a button:","html","true",$button_chat);
}
elseif ($textmessage == 'cancel search'){
$newlist = str_replace($from_id,"",$chatadd); save("data/chat.txt",$newlist); 
SendMessage ($chat_id,"❌ Search canceled.","html","true",$button_chat); 
}
elseif ($textmessage == 'profile'){
$vipsbot = file_get_contents('data/vips.txt');
$vipsbot2 = explode("\n",$vipsbot);
if (in_array($from_id,$vipsbot2)){
$namu = file_get_contents("user/".$randtrue."/nam.txt");
$mlifeu = file_get_contents("user/".$randtrue."/mlife.txt");
$sennu = file_get_contents("user/".$randtrue."/senn.txt");
$jensu = file_get_contents("user/".$randtrue."/jens.txt");
SendMessage ($chat_id,"profile :

name : $namu 
age : $sennu 
location : $mlifeu
gender : $jensu","html","true");
}else{
SendMessage($chat_id,"Unfortunately your account is not VIP
To see other's profile you should upgrade your account.","html","true");
}
}
elseif($textmessage == "chatroom"){
$run = file_get_contents("global/$from_id/run.txt");
if($run !== "global"){
mkdir("global/$from_id");
run($from_id,"global");
var_dump(bot('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"You joined the chatroom!\nTo see number of online users click /onlines.",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode([
'keyboard'=>[
[
['text'=>"Exit chatroom"]
]
],
'resize_keyboard'=>true
])
]));
foreach(scandir("global") as $user){
if($user != $from_id){
var_dump(bot('sendMessage',[
'chat_id'=>$user,
'text'=>"<a href='tg://user?id=$from_id'>$name</a> Joined the chatroom.",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'keyboard'=>[
[
['text'=>"Exit chatroom"]
]
],
'resize_keyboard'=>true
])
]));
}
}
}else{
sendmessage($from_id,"You're in chatroom!");
}
}
$run = file_get_contents("global/$from_id/run.txt");
if($run == "global"){
foreach(scandir("global") as $user){
if($textmessage !== "Exit chatroom" && $textmessage !== "/start" && $textmessage !== "/onlines" && $textmessage !== "chatroom"){
if(preg_match("'^(.*)\n(.*)(@)(.*)'",$textmessage)){
preg_match("'^(.*)(@)(.*)'",$textmessage,$match);
sendmessage($chat_id,"⚠️ Link and ID are forbidden.");
break;
}
if(preg_match("'^(.*)\n(@)(.*)'",$textmessage)){
preg_match("'^(.*)(@)(.*)'",$textmessage,$match);
sendmessage($chat_id,"⚠️ Link and ID are forbidden.");
break;
}
if(preg_match("'^(@)(.*)'",$textmessage)){
preg_match("'^(.*)(@)(.*)'",$textmessage,$match);
sendmessage($chat_id,"⚠️ Link and ID are forbidden.");
break;
}
if(preg_match("'^(.*)(@)(.*)'",$textmessage)){
preg_match("'^(.*)(@)(.*)'",$textmessage,$match);
sendmessage($chat_id,"⚠️ Link and ID are forbidden.");
break;
}
if(preg_match("'^(.*)(https://)(.*)'",$textmessage)){
sendmessage($chat_id,"⚠️ Link and ID are forbidden.");
break;
}
if(preg_match("'^(.*)(http://)(.*)'",$textmessage)){
sendmessage($chat_id,"⚠️ Link and ID are forbidden.");
break;
}
if(preg_match("'^(.*)(t.me/)(.*)'",$textmessage)){
sendmessage($chat_id,"⚠️ Link and ID are forbidden.");
break;
}
if(preg_match("'^(.*)(telegram.me/)(.*)'",$textmessage)){
sendmessage($chat_id,"⚠️ Link and ID are forbidden.");
break;
}
if(preg_match("'^(.*)(pussy)(.*)'",$textmessage)){
sendmessage($chat_id,"This word is banned!");
break;
}
if(preg_match("'^(.*)(dick)(.*)'",$textmessage)){
    sendmessage($chat_id,"This word is banned!");
    break;
    }
if(preg_match("'^(.*)(fuck)(.*)'",$textmessage)){
sendmessage($chat_id,"This word is banned!");
break;
}
if($sticker){
    sendmessage($chat_id,"Stickers are forbidden!");
    break;
}
if($gif){
    sendmessage($chat_id,"Gifs are forbidden!");
    break;
}
if($forward_chat_username){
    sendmessage($chat_id,"Forward is forbidden!");
    break;
}
if($user != $from_id){
bot('ForwardMessage',[
'chat_id'=>$user,
'from_chat_id'=>"$from_id",
'message_id'=>"$message_id"
]);
}
unlink("error_log");
}
}
}
if($textmessage == "Exit chatroom"){
$run = file_get_contents("global/$from_id/run.txt");
if($run == "global"){
run($from_id,"no");
unlink("global/$from_id/run.txt");
rmdir("global/$from_id");
foreach(scandir("global") as $user){
var_dump(bot('sendMessage',[
'chat_id'=>$user,
'text'=>"<a href='tg://user?id=$from_id'>$name</a> exited the chatroom.",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
'keyboard'=>[
[
['text'=>"Exit chatroom"]
]
],
'resize_keyboard'=>true
])
]));
}
var_dump(bot('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"🔆 You just exited the chatroom!",
'parse_mode'=>'MarkDown',
'reply_markup'=>$button_official
]));
}else{
sendmessage($from_id,"You're not in chatroom❗️");
}
}
if($textmessage == "/onlines"){
$b = scandir("global");
$c = count($b);
$cc = $c - 2;
var_dump(bot('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"$cc users are online.",
'parse_mode'=>'html'
]));
}
elseif($textmessage == "random chat"){
$txtt = file_get_contents('data/chat.txt');
$member_id = explode("\n",$txtt);
$mmemcount = count($member_id) -1;
// Number of online users : $mmemcount
SendMessage($chat_id,"Searching... ","html","true",$button_back_search);
file_put_contents("data/chat.txt","$chatadd\n$from_id");
file_put_contents("user/".$from_id."/rand.txt",null);
$all_member = fopen( "data/chat.txt", "r");
while( !feof( $all_member)) {
$user = fgets( $all_member);
$user = str_replace(" ","",$user);
$user = str_replace("\n","",$user);
$blck = file_get_contents("user/".$from_id."/block.txt");
$blck2 = file_get_contents("user/".$user."/block.txt");
$ex = explode("\n",$blck);
$ex2 = explode("\n",$blck2);
if($user != null && $user != "" && $user != "\n" && $from_id != $user && !in_array($from_id,$ex2) && !in_array($user,$ex)){
file_put_contents("user/".$from_id."/rand.txt",$user);
break;
}else{
file_put_contents("user/".$from_id."/rand.txt",null);
}
}
$rand = file_get_contents("user/".$from_id."/rand.txt");
if($rand != null){
file_put_contents("user/".$from_id."/command.txt","chat start");
file_put_contents("user/".$rand."/command.txt","chat start");
file_put_contents("user/".$rand."/rand.txt",$from_id);
$str = str_replace($from_id,'',$chatadd);
$str = str_replace($rand,'',$chatadd);
file_put_contents("data/chat.txt",$str);
SendMessage($chat_id,"Partner found!

say hi:","html","true",$button_back_chat);
SendMessage($rand,"Partner found!

say hi:","html","true",$button_back_chat);
}
}
elseif($textmessage == 'end chat'){
SendMessage($chat_id,"Are you sure?
You can block the user before ending the chat.

Please choose a button:","html","true",$button_chat2);
}
elseif ($textmessage == '⚠️ end chat'){
SendMessage($randtrue,"Chat ended by the other user.

Do you want to block him/her?","html","true",$button_chat3);
file_put_contents("user/".$randtrue."/rand.txt",null);
save("user/$from_id/command.txt","none");
SendMessage($chat_id,"Chat ended","html","true",$button_chat);
}
elseif($textmessage == 'block'){
$myfile2 = fopen("user/$from_id/block.txt","a") or die("Unable to open file!"); 
fwrite($myfile2,"$randtrue\n");
fclose($myfile2);
save("user/$from_id/command.txt","none");
SendMessage($chat_id,"Chat ended and the user is blocked.","html","true",$button_chat);
}
elseif($textmessage == "don't block"){
save("user/$from_id/command.txt","none");
SendMessage($chat_id,"Chat ended.","html","true",$button_chat);
}
elseif($textmessage == 'continue chat'){
SendMessage($chat_id,"Now you can continue your chat :","html","true",$button_back_chat);
}
elseif ($textmessage == '⚠️ block and end chat'){
SendMessage($randtrue,"Chat ended by the other user.","html","true",$button_chat);
save("user/$randtrue/command.txt","none");
save("user/$from_id/command.txt","none");
$myfile2 = fopen("user/$from_id/block.txt","a") or die("Unable to open file!"); 
fwrite($myfile2,"$randtrue\n");
fclose($myfile2);
SendMessage($chat_id,"Chat ended and the user is blocked.","html","true",$button_chat);
}
elseif($textmessage == "👱🏼 chat with boy"){
$vipsbot = file_get_contents('data/vips.txt');
$vipsbot2 = explode("\n",$vipsbot);
if (in_array($from_id,$vipsbot2)){
$txtt = file_get_contents('data/chat.txt');
$member_id = explode("\n",$txtt);
$mmemcount = count($member_id) -1;
SendMessage($chat_id,"Searching... ","html","true",$button_back_search);
file_put_contents("data/chat.txt","$chatadd\n$from_id");
file_put_contents("user/".$from_id."/rand.txt",null);
$all_member = fopen( "data/chat.txt", "r");
while( !feof( $all_member)) {
$user = fgets( $all_member);
$user = str_replace(" ","",$user);
$user = str_replace("\n","",$user);
$blck = file_get_contents("user/".$from_id."/block.txt");
$blck2 = file_get_contents("user/".$user."/block.txt");
$jns = file_get_contents("user/".$user."/jens.txt");
$jns2 = file_get_contents("user/".$from_id."/jens.txt");
$ex = explode("\n",$blck);
$ex2 = explode("\n",$blck2);
if($jns =="male" && $user != null && $user != "" && $user != "\n" && $from_id != $user && !in_array($from_id,$ex2) && !in_array($user,$ex && $jns == "male" && $jns != "not defined" && $jns != null && $jns != "" && $jns != "\n")){
file_put_contents("user/".$from_id."/rand.txt",$user);
break;
}else{
file_put_contents("user/".$from_id."/rand.txt",null);
}
}
$rand = file_get_contents("user/".$from_id."/rand.txt");
if($rand != null){
file_put_contents("user/".$from_id."/command.txt","chat start");
file_put_contents("user/".$rand."/command.txt","chat start");
file_put_contents("user/".$rand."/rand.txt",$from_id);
$str = str_replace($from_id,'',$chatadd);
$str = str_replace($rand,'',$chatadd);
file_put_contents("data/chat.txt",$str);
SendMessage($chat_id,"Partner found!

say hi:","html","true",$button_back_chat);
SendMessage($rand,"Partner found!

say hi:","html","true",$button_back_chat);
}
}else{
SendMessage ($chat_id,"Your account needs to be VIP to use this feature.","html","true",$button_chat);
}
}
elseif($textmessage == "👩🏻 chat with girl"){
$vipsbot = file_get_contents('data/vips.txt');
$vipsbot2 = explode("\n",$vipsbot);
if (in_array($from_id,$vipsbot2)){
$txtt = file_get_contents('data/chat.txt');
$member_id = explode("\n",$txtt);
$mmemcount = count($member_id) -1;
SendMessage($chat_id,"Searching...","html","true",$button_back_search);
file_put_contents("data/chat.txt","$chatadd\n$from_id");
file_put_contents("user/".$from_id."/rand.txt",null);
$all_member = fopen( "data/chat.txt", "r");
while( !feof( $all_member)) {
$user = fgets( $all_member);
$user = str_replace(" ","",$user);
$user = str_replace("\n","",$user);
$blck = file_get_contents("user/".$from_id."/block.txt");
$blck2 = file_get_contents("user/".$user."/block.txt");
$jns = file_get_contents("user/".$user."/jens.txt");
$jns2 = file_get_contents("user/".$from_id."/jens.txt");
$ex = explode("\n",$blck);
$ex2 = explode("\n",$blck2);
if($jns =="female" && $user != null && $user != "" && $user != "\n" && $from_id != $user && !in_array($from_id,$ex2) && !in_array($user,$ex && $jns == "female" && $jns != "not defined" && $jns != null && $jns != "" && $jns != "\n")){
file_put_contents("user/".$from_id."/rand.txt",$user);
break;
}else{
file_put_contents("user/".$from_id."/rand.txt",null);
}
}
$rand = file_get_contents("user/".$from_id."/rand.txt");
if($rand != null){
file_put_contents("user/".$from_id."/command.txt","chat start");
file_put_contents("user/".$rand."/command.txt","chat start");
file_put_contents("user/".$rand."/rand.txt",$from_id);
$str = str_replace($from_id,'',$chatadd);
$str = str_replace($rand,'',$chatadd);
file_put_contents("data/chat.txt",$str);
SendMessage($chat_id,"Partner found!

say hi:","html","true",$button_back_chat);
SendMessage($rand,"Partner found!

say hi:","html","true",$button_back_chat);
}
}else{
SendMessage ($chat_id,"Your account needs to be VIP to use this feature.","html","true",$button_chat);
}
}
elseif($command == "chat start"){
if($stickerid != null){
SendSticker($randtrue,$stickerid);
}
elseif($videoid != null){
SendVideo($randtrue,$videoid,$caption);
}
elseif($voiceid != null){
SendVoice($randtrue,$voiceid,"",$caption);
}
elseif($fileid != null){
SendDocument($randtrue,$fileid,"",$caption);
}
elseif($musicid != null){
SendAudio($randtrue,$musicid,"",$caption);
}
elseif($photoid != null){
SendPhoto($randtrue,$photoid,"",$caption);
}
elseif($textmessage != null){
SendMessage($randtrue,$textmessage,"html","true");
}
}
elseif($textmessage == 'register'){
save("user/$from_id/signup.txt","nam");
SendMessage($chat_id,"Please enter your name :","html","true");
}
elseif($signup == 'nam'){
save("user/$from_id/signup.txt","senn");
save("user/$from_id/nam.txt","$textmessage");
SendMessage($chat_id,"Select your age :","html","true",$button_senn);
}
elseif($signup == 'senn'){
if ($textmessage == '18' or $textmessage == '19' or $textmessage == '20' or $textmessage == '21' or $textmessage == '22' or $textmessage == '23' or $textmessage == '24' or $textmessage == '25' or $textmessage == '26' or $textmessage == '27' or $textmessage == '28' or $textmessage == '29' or $textmessage == '30' or $textmessage == '31' or $textmessage == '32' or $textmessage == '33' or $textmessage == '34' or $textmessage == '35' or $textmessage == '36' or $textmessage == '37' or $textmessage == '38' or $textmessage == '39' or $textmessage == '40' or $textmessage == '41' or $textmessage == '42' or $textmessage == '43' or $textmessage == '44' or $textmessage == '45' or $textmessage == '46' or $textmessage == '47' or $textmessage == '48' or $textmessage == '49' or $textmessage == '50' or $textmessage == '51' or $textmessage == '52' or $textmessage == '53' or $textmessage == '54' or $textmessage == '55' or $textmessage == '56' or $textmessage == '57' or $textmessage == '58' or $textmessage == '59' or $textmessage == '60' or $textmessage == '61' or $textmessage == '62' or $textmessage == '63' or $textmessage == '64' or $textmessage == '65' or $textmessage == '66' or $textmessage == '67' or $textmessage == '68' or $textmessage == '69' or $textmessage == '70' or $textmessage == '71' or $textmessage == '72' or $textmessage == '73' or $textmessage == '74' or $textmessage == '75' or $textmessage == '76' or $textmessage == '77' or $textmessage == '78' or $textmessage == '79' or $textmessage == '80'){
save("user/$from_id/signup.txt","mlife");
save("user/$from_id/senn.txt","$textmessage");
SendMessage($chat_id,"Now select where you live :","html","true",$button_mlife);
}else{
SendMessage($chat_id,"Please only use buttons :","html","true",$button_senn);
}
}
elseif($signup == 'mlife'){
if ($textmessage == 'Andaman and Nicobar' or $textmessage == 'Andhra Pradesh' or $textmessage == 'Arunachal Pradesh' or $textmessage == 'Assam' or $textmessage == 'Bihar' or $textmessage == 'Chandigarh' or $textmessage == 'Chhattisgarh' or $textmessage == 'Dadra and Nagar Haveli' or $textmessage == 'Daman and Diu' or $textmessage == 'Delhi' or $textmessage == 'Goa' or $textmessage == 'Gujarat' or $textmessage == 'Haryana' or $textmessage == 'Himachal Pradesh' or $textmessage == 'Jammu and Kashmir' or $textmessage == 'Jharkhand' or $textmessage == 'Karnataka' or $textmessage == 'Kerala' or $textmessage == 'Lakshadweep' or $textmessage == 'Madhya Pradesh' or $textmessage == 'Maharashtra' or $textmessage == 'Manipur' or $textmessage == 'Meghalaya' or $textmessage == 'Mizoram' or $textmessage == 'Nagaland' or $textmessage == 'Orissa' or $textmessage == 'Puducherry' or $textmessage == 'Punjab' or $textmessage == 'Rajasthan' or $textmessage == 'Sikkim' or $textmessage == 'Tamil Nadu' or $textmessage == 'Telangana' or $textmessage == 'Tripura' or $textmessage == 'Uttar Pradesh' or $textmessage == 'Uttarakhand' or $textmessage == 'West Bengal'){
save("user/$from_id/signup.txt","jens");
save("user/$from_id/mlife.txt","$textmessage");
SendMessage($chat_id,"Select your gender :

⚠️ You can't change your gender later, please choose carefully.","html","true",$button_jens);
}else{
SendMessage($chat_id,"Please only use buttons :","html","true",$button_mlife);
}
}
elseif($signup == 'jens'){
if($textmessage == 'male' or $textmessage == 'female'){
save("user/$from_id/signup.txt","ok");
if($textmessage == 'male'){
save("user/$from_id/jens.txt","male");
}
if($textmessage == 'female'){
save("user/$from_id/jens.txt","female");
}
SendMessage($chat_id,"You're registered successfully.","html","true",$button_official);
}else{
SendMessage($chat_id,"Please only use buttons :","html","true",$button_jens);
}
}
elseif($textmessage == 'edit'){
save("user/$from_id/change.txt","nam");
SendMessage($chat_id,"Please enter your name :","html","true",$button_back);
}
elseif($change == 'nam'){
save("user/$from_id/change.txt","senn");
save("user/$from_id/nam.txt","$textmessage");
SendMessage($chat_id,"Select your age :","html","true",$button_senn);
}
elseif($change == 'senn'){
if ($textmessage == '18' or $textmessage == '19' or $textmessage == '20' or $textmessage == '21' or $textmessage == '22' or $textmessage == '23' or $textmessage == '24' or $textmessage == '25' or $textmessage == '26' or $textmessage == '27' or $textmessage == '28' or $textmessage == '29' or $textmessage == '30' or $textmessage == '31' or $textmessage == '32' or $textmessage == '33' or $textmessage == '34' or $textmessage == '35' or $textmessage == '36' or $textmessage == '37' or $textmessage == '38' or $textmessage == '39' or $textmessage == '40' or $textmessage == '41' or $textmessage == '42' or $textmessage == '43' or $textmessage == '44' or $textmessage == '45' or $textmessage == '46' or $textmessage == '47' or $textmessage == '48' or $textmessage == '49' or $textmessage == '50' or $textmessage == '51' or $textmessage == '52' or $textmessage == '53' or $textmessage == '54' or $textmessage == '55' or $textmessage == '56' or $textmessage == '57' or $textmessage == '58' or $textmessage == '59' or $textmessage == '60' or $textmessage == '61' or $textmessage == '62' or $textmessage == '63' or $textmessage == '64' or $textmessage == '65' or $textmessage == '66' or $textmessage == '67' or $textmessage == '68' or $textmessage == '69' or $textmessage == '70' or $textmessage == '71' or $textmessage == '72' or $textmessage == '73' or $textmessage == '74' or $textmessage == '75' or $textmessage == '76' or $textmessage == '77' or $textmessage == '78' or $textmessage == '79' or $textmessage == '80'){
save("user/$from_id/change.txt","mlife");
save("user/$from_id/senn.txt","$textmessage");
SendMessage($chat_id,"Now select where you live :","html","true",$button_mlife);
}else{
SendMessage($chat_id,"Please only use buttons :","html","true",$button_senn);
}
}
elseif($change == 'mlife'){
if ($textmessage == 'Andaman and Nicobar' or $textmessage == 'Andhra Pradesh' or $textmessage == 'Arunachal Pradesh' or $textmessage == 'Assam' or $textmessage == 'Bihar' or $textmessage == 'Chandigarh' or $textmessage == 'Chhattisgarh' or $textmessage == 'Dadra and Nagar Haveli' or $textmessage == 'Daman and Diu' or $textmessage == 'Delhi' or $textmessage == 'Goa' or $textmessage == 'Gujarat' or $textmessage == 'Haryana' or $textmessage == 'Himachal Pradesh' or $textmessage == 'Jammu and Kashmir' or $textmessage == 'Jharkhand' or $textmessage == 'Karnataka' or $textmessage == 'Kerala' or $textmessage == 'Lakshadweep' or $textmessage == 'Madhya Pradesh' or $textmessage == 'Maharashtra' or $textmessage == 'Manipur' or $textmessage == 'Meghalaya' or $textmessage == 'Mizoram' or $textmessage == 'Nagaland' or $textmessage == 'Orissa' or $textmessage == 'Puducherry' or $textmessage == 'Punjab' or $textmessage == 'Rajasthan' or $textmessage == 'Sikkim' or $textmessage == 'Tamil Nadu' or $textmessage == 'Telangana' or $textmessage == 'Tripura' or $textmessage == 'Uttar Pradesh' or $textmessage == 'Uttarakhand' or $textmessage == 'West Bengal'){
save("user/$from_id/mlife.txt","$textmessage");
save("user/$from_id/change.txt","true");
SendMessage($chat_id,"✅ Your profile is submitted.","html","true",$button_official);
}else{
SendMessage($chat_id,"Please only use buttons :","html","true",$button_mlife);
}
}
elseif($textmessage == '/panel' and $from_id == $admin){
file_put_contents("user/".$from_id."/command.txt","none");
SendMessage($chat_id,"Welcome to admin's panel","html","true",$button_admin);
}
elseif($textmessage == 'Statistics' and $from_id == $admin){
$txtt = file_get_contents('data/allmember.txt');
$member_id = explode("\n",$txtt);
$mmemcount = count($member_id) -1;
SendMessage($chat_id,"Number of users: $mmemcount ","html","true");
}
elseif($textmessage == 'Forward to everyone' and $from_id == $admin){
file_put_contents("user/".$from_id."/command.txt","s2a fwd");
SendMessage($chat_id,"Enter your message: ","html","true",$button_back);
}
elseif($command == 's2a fwd' and $from_id == $admin){
file_put_contents("user/".$from_id."/command.txt","none");
SendMessage($chat_id,"Your message is sent.","html","true",$button_admin);
$all_member = fopen( "data/allmember.txt", 'r');
while( !feof( $all_member)) {
$user = fgets( $all_member);
ForwardMessage($user,$admin,$message_id);
}
}
elseif($textmessage == 'Send message to everyone' and $from_id == $admin){
file_put_contents("user/".$from_id."/command.txt","s2a");
SendMessage($chat_id,"Enter your message: ","html","true",$button_back);
}
elseif($command == 's2a' and $from_id == $admin and $textmessage != "🔙 back" and $textmessage != "/panel" and $textmessage != "/start"){
file_put_contents("user/".$from_id."/command.txt","none");
SendMessage($chat_id,"Your message is sent.","html","true",$button_admin);
$all_member = fopen( "data/allmember.txt", 'r');
while( !feof( $all_member)) {
$user = fgets( $all_member);
if($sticker_id != null){
SendSticker($user,$stickerid);
}
elseif($videoid != null){
SendVideo($user,$videoid,$caption);
}
elseif($voiceid != null){
SendVoice($user,$voiceid,'',$caption);
}
elseif($fileid != null){
SendDocument($user,$fileid,'',$caption);
}
elseif($musicid != null){
SendAudio($user,$musicid,'',$caption);
}
elseif($photoid != null){
SendPhoto($user,$photoid,'',$caption);
}
elseif($textmessage != null){
SendMessage($user,$textmessage,"html","true");
}
}
}
elseif($textmessage == 'Warn user' && $from_id == $admin){
save ("user/$from_id/command.txt","warn");
SendMessage($chat_id,"Enter user's numerical id: :","html","true",$button_back);
}
elseif($command == 'warn'){
if (file_exists("user/$textmessage/step.txt")){
$warnk = file_get_contents("user/".$textmessage."/warn.txt");
$newwarn = $warnk + 1;
save ("user/$textmessage/warn.txt",$newwarn);
save ("user/$from_id/command.txt","none");
$warnuser = file_get_contents("user/".$textmessage."/warn.txt");
SendMessage($chat_id,"The user is warned
Number of user's warns: $warnuser","html","true",$button_admin);
SendMessage($textmessage,"You just got a warning

You have $warnuser warning.");
save ("user/$from_id/sendwarn.txt","none");
}else{
save ("user/$from_id/command.txt","none");
SendMessage($chat_id,"User's not found");
}
}
elseif($textmessage == 'Unban user' && $from_id == $admin){
SendMessage($chat_id,"Use this command to unban user: 
/unban Userid");
}
elseif($textmessage == 'Ban user' && $from_id == $admin){
SendMessage($chat_id,"Use this command to ban user: 
/ban Userid");
}
elseif (strpos($textmessage , "/ban") !== false && $from_id == $admin)
{
$bban = str_replace('/ban','',$textmessage);
if ($bban != '')
{
$myfile2 = fopen("data/banlist.txt", "a") or die("Unable to open file!"); 
fwrite($myfile2, "$bban\n");
fclose($myfile2);
SendMessage($chat_id,"$bban is banned");
}
}
elseif (strpos($textmessage , "/unban") !== false && $from_id == $admin)
{
$unbban = str_replace('/unban','',$textmessage);
if ($unbban != '')
{
$newlist = str_replace($unbban,"","data/banlist.txt");
save("data/banlist.txt",$newlist);
SendMessage($chat_id,"$unbban is unbanned");
}
}
elseif($textmessage == 'Send message to user' && $from_id == $admin){
save("user/$from_id/command.txt","sendpm");
SendMessage($chat_id,"Enter user's numerical id:","html","true",$button_back);
} 
elseif ($command == 'sendpm'){
$senduser = $textmessage;
//save the user ID that admin is gonna send a message to
save("data/adminSendUser.txt", $senduser);
if(file_exists('user/'.$senduser."/step.txt")){
save("user/$from_id/command.txt","sendpm2");
SendMessage($chat_id,"Enter your message :","html","true",json_encode(['keyboard'=>[
[['text'=>'/panel']],
],'resize_keyboard'=>true]));
}
}
elseif ($command == 'message-support'){
if($textmessage == "🔙 back"){
save("user/$from_id/command.txt","none");
SendMessage($chat_id, "Your support request is canceled.", "html","true", $button_official);
} else{
SendMessage($admin, "New message: 
$name
@$username
$from_id

$textmessage","html","true");
SendMessage($chat_id, "Your message is successfully sent to support.", "html","true", $button_official);
save("user/$from_id/command.txt","none");
}
}
elseif ($command == 'sendpm2' and $textmessage !== '🔙 back' and $textmessage !== '/start'){
$senduser = file_get_contents("data/adminSendUser.txt");
$sendtext = $textmessage;
SendMessage($senduser,"New message from support :

$sendtext","html","true");
SendMessage($chat_id,"Sent.","html","true");
}
elseif($textmessage == 'User profile' && $from_id == $admin){
save("user/$from_id/command.txt","info");
SendMessage($chat_id,"Enter user's numerical id: :","html","true",$button_back);
}
elseif ($command == 'info'){
if(file_exists("user/$textmessage/step.txt")){
save("user/$from_id/command.txt","none");
$namu = file_get_contents("user/".$textmessage."/nam.txt");
$mlifeu = file_get_contents("user/".$textmessage."/mlife.txt");
$sennu = file_get_contents("user/".$textmessage."/senn.txt");
$jensu = file_get_contents("user/".$textmessage."/jens.txt");
SendMessage($chat_id,"User profile :

Name : $namu
Sex : $jensu 
Age : $sennu 
Location = $mlifeu","html","true",$button_admin);
}else{
SendMessage($chat_id,"User not found","html","true",$button_back);
}
}
elseif($textmessage == 'Add vip' && $from_id == $admin){
save ("user/$from_id/command.txt","addvip");
SendMessage($chat_id,"Enter user's numerical id: :","html","true",$button_back);
}
elseif($command == 'addvip'){
if(file_exists("user/$textmessage/step.txt")){
save("user/$from_id/command.txt","none");
$myfile2 = fopen("data/vips.txt","a") or die("Unable to open file!"); 
fwrite($myfile2,"$textmessage\n");
fclose($myfile2);
SendMessage($chat_id,"User is vip now","html","true",$button_admin);
SendMessage($textmessage,"Your account became VIP by the bot's support.","html","true");
}else{
SendMessage($chat_id,"User not found");
}
}
elseif ($textmessage == 'Delete vip' && $from_id == $admin){
save ("user/$from_id/command.txt","delvip");
SendMessage($chat_id,"Enter user's numerical id: :","html","true", $button_back);
}
elseif ($command == 'delvip'){
if(file_exists("user/$textmessage/step.txt")){
$newlist = str_replace($textmessage,"",$vips);
save("data/vips.txt",$newlist);
SendMessage($chat_id,"User's vip is cancelled","html","true",$button_admin);
SendMessage($textmessage,"Your VIP is canceled by the bot's support.","html","true");
}else{
SendMessage($chat_id,"User not found");
}
}elseif($textmessage == 'admin' && $from_id == $admin){
SendMessage($admin,"Welcome to admin panel:)","html","true",$button_admin);
} elseif($textmessage == '🔙 back'){
SendMessage($chat_id,"Please choose a button","html","true",$button_official);
}
//=============
if(!file_exists('user/'.$from_id)){
mkdir('user/'.$from_id);
}
if(!file_exists('user/'.$from_id."/warn.txt")){
file_put_contents('user/'.$from_id."/warn.txt","0");
}
$txxt = file_get_contents('data/allmember.txt');
$pmembersid= explode("\n",$txxt);
if (!in_array($chat_id,$pmembersid)){
$aaddd = file_get_contents('data/allmember.txt');
$aaddd .= $chat_id."\n";
file_put_contents('data/allmember.txt',$aaddd);
}
?>