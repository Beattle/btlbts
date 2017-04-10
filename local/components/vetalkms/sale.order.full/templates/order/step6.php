<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div style="padding:10px;">
				<h1 class="heading"><?$APPLICATION->ShowTitle(false)?></h1>
				<div class="main_news_content">
<table>
<tr>
	<td valign="top" width="60%">
		<?
		if (!empty($arResult["ORDER"]))
		{
			?>
			<b><?echo GetMessage("STOF_ORDER_CREATED")?></b><br /><br />
			<table class="sale_order_full_table">
				<tr>
					<td>
						<?= str_replace("#ORDER_DATE#", $arResult["ORDER"]["DATE_INSERT_FORMATED"], str_replace("#ORDER_ID#", $arResult["ORDER"]["ACCOUNT_NUMBER"], GetMessage("STOF_ORDER_CREATED_DESCR"))); ?><br /><br />
						
					</td>
				</tr>
			</table>
			<?
			if (!empty($arResult["PAY_SYSTEM"]))
			{
				?>
				<br /><br />
				<b><?echo GetMessage("STOF_ORDER_PAY_ACTION")?></b><br /><br />

				<table class="sale_order_full_table">
					<tr>
						<td>
							<?echo GetMessage("STOF_ORDER_PAY_ACTION1")?> <?= $arResult["PAY_SYSTEM"]["NAME"] ?>
						</td>
					</tr>
					<?
					if (strlen($arResult["PAY_SYSTEM"]["ACTION_FILE"]) > 0)
					{
						?>
						<tr>
							<td>
								<?
								if ($arResult["PAY_SYSTEM"]["NEW_WINDOW"] == "Y")
								{
									?>
									<script language="JavaScript">
										window.open('<?=$arParams["PATH_TO_PAYMENT"]?>?ORDER_ID=<?=urlencode(urlencode($arResult["ORDER"]["ACCOUNT_NUMBER"]))?>');
									</script>
									<?= str_replace("#LINK#", $arParams["PATH_TO_PAYMENT"]."?ORDER_ID=".urlencode(urlencode($arResult["ORDER"]["ACCOUNT_NUMBER"])), GetMessage("STOF_ORDER_PAY_WIN")) ?>
									<?
								}
								else
								{
									if (strlen($arResult["PAY_SYSTEM"]["PATH_TO_ACTION"])>0)
									{
										include($arResult["PAY_SYSTEM"]["PATH_TO_ACTION"]);
									}
								}
								?>
							</td>
						</tr>
						<?
					}
					?>
				</table>
				<?
			}
		}
		else
		{
			?>
			<b><?echo GetMessage("STOF_ERROR_ORDER_CREATE")?></b><br /><br />

			<table class="sale_order_full_table">
				<tr>
					<td>
						<?=str_replace("#ORDER_ID#", $arResult["ORDER_ID"], GetMessage("STOF_NO_ORDER"))?>
						<?=GetMessage("STOF_CONTACT_ADMIN")?>
					</td>
				</tr>
			</table>
			<?
		}
		?>
	</td>
	<td valign="top" width="5%">&nbsp;</td>
	
</tr>
</table>
</div></div>