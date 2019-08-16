var FiltersEnabled = 0; // if your not going to use transitions or filters in any of the tips set this to 0
var spacer="&nbsp; &nbsp; &nbsp; ";

// email notifications to admin
notifyAdminNewMembers0Tip=["", spacer+"No email notifications to admin."];
notifyAdminNewMembers1Tip=["", spacer+"Notify admin only when a new member is waiting for approval."];
notifyAdminNewMembers2Tip=["", spacer+"Notify admin for all new sign-ups."];

// visitorSignup
visitorSignup0Tip=["", spacer+"If this option is selected, visitors will not be able to join this group unless the admin manually moves them to this group from the admin area."];
visitorSignup1Tip=["", spacer+"If this option is selected, visitors can join this group but will not be able to sign in unless the admin approves them from the admin area."];
visitorSignup2Tip=["", spacer+"If this option is selected, visitors can join this group and will be able to sign in instantly with no need for admin approval."];

// clients table
clients_addTip=["",spacer+"This option allows all members of the group to add records to the 'Available budget' table. A member who adds a record to the table becomes the 'owner' of that record."];

clients_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Available budget' table."];
clients_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Available budget' table."];
clients_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Available budget' table."];
clients_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Available budget' table."];

clients_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Available budget' table."];
clients_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Available budget' table."];
clients_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Available budget' table."];
clients_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Available budget' table, regardless of their owner."];

clients_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Available budget' table."];
clients_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Available budget' table."];
clients_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Available budget' table."];
clients_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Available budget' table."];

// incomes table
incomes_addTip=["",spacer+"This option allows all members of the group to add records to the 'Incomes' table. A member who adds a record to the table becomes the 'owner' of that record."];

incomes_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Incomes' table."];
incomes_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Incomes' table."];
incomes_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Incomes' table."];
incomes_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Incomes' table."];

incomes_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Incomes' table."];
incomes_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Incomes' table."];
incomes_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Incomes' table."];
incomes_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Incomes' table, regardless of their owner."];

incomes_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Incomes' table."];
incomes_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Incomes' table."];
incomes_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Incomes' table."];
incomes_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Incomes' table."];

// expenses table
expenses_addTip=["",spacer+"This option allows all members of the group to add records to the 'Expenses' table. A member who adds a record to the table becomes the 'owner' of that record."];

expenses_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Expenses' table."];
expenses_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Expenses' table."];
expenses_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Expenses' table."];
expenses_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Expenses' table."];

expenses_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Expenses' table."];
expenses_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Expenses' table."];
expenses_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Expenses' table."];
expenses_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Expenses' table, regardless of their owner."];

expenses_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Expenses' table."];
expenses_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Expenses' table."];
expenses_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Expenses' table."];
expenses_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Expenses' table."];

/*
	Style syntax:
	-------------
	[TitleColor,TextColor,TitleBgColor,TextBgColor,TitleBgImag,TextBgImag,TitleTextAlign,
	TextTextAlign,TitleFontFace,TextFontFace, TipPosition, StickyStyle, TitleFontSize,
	TextFontSize, Width, Height, BorderSize, PadTextArea, CoordinateX , CoordinateY,
	TransitionNumber, TransitionDuration, TransparencyLevel ,ShadowType, ShadowColor]

*/

toolTipStyle=["white","#00008B","#000099","#E6E6FA","","images/helpBg.gif","","","","\"Trebuchet MS\", sans-serif","","","","3",400,"",1,2,10,10,51,1,0,"",""];

applyCssFilter();
