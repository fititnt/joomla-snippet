<?php
//Estados do Brasil, Value UF
//http://www.fititnt.org/codigo/joomla/estados-do-brasil.html
$estadodobrasil = array();
$estadodobrasil[] = JHTML::_('select.option', '', JText::_('UF_UNDEFINED'));
$estadodobrasil[] = JHTML::_('select.option', 'AC', JText::_('UF_AC'));
$estadodobrasil[] = JHTML::_('select.option', 'AL', JText::_('UF_AL'));
$estadodobrasil[] = JHTML::_('select.option', 'AP', JText::_('UF_AP'));
$estadodobrasil[] = JHTML::_('select.option', 'AM', JText::_('UF_AM'));
$estadodobrasil[] = JHTML::_('select.option', 'BA', JText::_('UF_BA'));
$estadodobrasil[] = JHTML::_('select.option', 'CE', JText::_('UF_CE'));
$estadodobrasil[] = JHTML::_('select.option', 'DF', JText::_('UF_DF'));
$estadodobrasil[] = JHTML::_('select.option', 'ES', JText::_('UF_ES'));
$estadodobrasil[] = JHTML::_('select.option', 'GO', JText::_('UF_GO'));
$estadodobrasil[] = JHTML::_('select.option', 'MA', JText::_('UF_MA'));
$estadodobrasil[] = JHTML::_('select.option', 'MT', JText::_('UF_MT'));
$estadodobrasil[] = JHTML::_('select.option', 'MS', JText::_('UF_MS'));
$estadodobrasil[] = JHTML::_('select.option', 'MG', JText::_('UF_MG'));
$estadodobrasil[] = JHTML::_('select.option', 'PA', JText::_('UF_PA'));
$estadodobrasil[] = JHTML::_('select.option', 'PB', JText::_('UF_PB'));
$estadodobrasil[] = JHTML::_('select.option', 'PR', JText::_('UF_PR'));
$estadodobrasil[] = JHTML::_('select.option', 'PE', JText::_('UF_PE'));
$estadodobrasil[] = JHTML::_('select.option', 'PI', JText::_('UF_PI'));
$estadodobrasil[] = JHTML::_('select.option', 'RJ', JText::_('UF_RJ'));
$estadodobrasil[] = JHTML::_('select.option', 'RN', JText::_('UF_RN'));
$estadodobrasil[] = JHTML::_('select.option', 'RS', JText::_('UF_RS'));
$estadodobrasil[] = JHTML::_('select.option', 'RO', JText::_('UF_RO'));
$estadodobrasil[] = JHTML::_('select.option', 'RR', JText::_('UF_RR'));
$estadodobrasil[] = JHTML::_('select.option', 'SC', JText::_('UF_SC'));
$estadodobrasil[] = JHTML::_('select.option', 'SP', JText::_('UF_SP'));
$estadodobrasil[] = JHTML::_('select.option', 'SE', JText::_('UF_SE'));
$estadodobrasil[] = JHTML::_('select.option', 'TO', JText::_('UF_TO'));
?>

<?php
//Estados do Brasil, Value 1~27
//http://www.fititnt.org/codigo/joomla/estados-do-brasil.html
$estadodobrasil = array();
$estadodobrasil[] = JHTML::_('select.option', '', JText::_('UF_UNDEFINED'));
$estadodobrasil[] = JHTML::_('select.option', '1', JText::_('UF_AC'));
$estadodobrasil[] = JHTML::_('select.option', '2', JText::_('UF_AL'));
$estadodobrasil[] = JHTML::_('select.option', '3', JText::_('UF_AP'));
$estadodobrasil[] = JHTML::_('select.option', '4', JText::_('UF_AM'));
$estadodobrasil[] = JHTML::_('select.option', '5', JText::_('UF_BA'));
$estadodobrasil[] = JHTML::_('select.option', '6', JText::_('UF_CE'));
$estadodobrasil[] = JHTML::_('select.option', '7', JText::_('UF_DF'));
$estadodobrasil[] = JHTML::_('select.option', '8', JText::_('UF_ES'));
$estadodobrasil[] = JHTML::_('select.option', '9', JText::_('UF_GO'));
$estadodobrasil[] = JHTML::_('select.option', '10', JText::_('UF_MA'));
$estadodobrasil[] = JHTML::_('select.option', '11', JText::_('UF_MT'));
$estadodobrasil[] = JHTML::_('select.option', '12', JText::_('UF_MS'));
$estadodobrasil[] = JHTML::_('select.option', '13', JText::_('UF_MG'));
$estadodobrasil[] = JHTML::_('select.option', '14', JText::_('UF_PA'));
$estadodobrasil[] = JHTML::_('select.option', '15', JText::_('UF_PB'));
$estadodobrasil[] = JHTML::_('select.option', '16', JText::_('UF_PR'));
$estadodobrasil[] = JHTML::_('select.option', '17', JText::_('UF_PE'));
$estadodobrasil[] = JHTML::_('select.option', '18', JText::_('UF_PI'));
$estadodobrasil[] = JHTML::_('select.option', '19', JText::_('UF_RJ'));
$estadodobrasil[] = JHTML::_('select.option', '20', JText::_('UF_RN'));
$estadodobrasil[] = JHTML::_('select.option', '21', JText::_('UF_RS'));
$estadodobrasil[] = JHTML::_('select.option', '22', JText::_('UF_RO'));
$estadodobrasil[] = JHTML::_('select.option', '23', JText::_('UF_RR'));
$estadodobrasil[] = JHTML::_('select.option', '24', JText::_('UF_SC'));
$estadodobrasil[] = JHTML::_('select.option', '25', JText::_('UF_SP'));
$estadodobrasil[] = JHTML::_('select.option', '26', JText::_('UF_SE'));
$estadodobrasil[] = JHTML::_('select.option', '27', JText::_('UF_TO'));
?>

<?php 
//Uso
echo JHTML::_('select.genericlist', $estadodobrasil, 'estado','class="inputbox"', 'value' , 'text', $this->item->estado, ''); ?>
