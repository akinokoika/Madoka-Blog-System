function eng_local_translate(){
    $$('#welcome').text('welcome: ');

    var list_sidebar = $$('#list_sidebar').find('div');
    list_sidebar[0].innerText = "Switch theme";
    list_sidebar[1].innerText = "Only background";
    list_sidebar[2].innerText = "Switch background";
    list_sidebar[3].innerText = "Video Music";
    list_sidebar[4].innerText = "Shopping";
    list_sidebar[5].innerText = "Message";
    list_sidebar[6].innerText = "Logout";
    list_sidebar[7].innerText = "Language";
    list_sidebar[8].innerText = "Close";

    $$('#welcome2').text('Welcome, current state: ');
    $$('#logout_bg').text('Logout');
    $$('#switch_bg').text('Switch theme');
    $$('#show_bg').text('Only background');
    $$('#drawer_btn').text('Sidebar');

    $$('#language_dialog').find('.mdui-dialog-title').text('Language');
    $$('#language_dialog').find('.Chinese').text('Chinese');
    $$('#language_dialog').find('.English').text('English');

    var tab_label = $$('#tab').find('label');
    tab_label[0].innerText = "Home";
    tab_label[1].innerText = "Management";
    tab_label[2].innerText = "System";

    $$('#sign_in_text').text('Sign in');
    var week_td = $$('#week').find('td');
    week_td[0].innerText = "Sun";
    week_td[1].innerText = "Mon";
    week_td[2].innerText = "Tues";
    week_td[3].innerText = "Wed";
    week_td[4].innerText = "Thur";
    week_td[5].innerText = "Fri";
    week_td[6].innerText = "Sat";

    $$('#latest_post').text('New publish essay');
    $$('#registered_users').text('New registered users');

    $$('#view_current_user').text('View current user essay');
    $$('#view_all_user').text('View all user essay');
}