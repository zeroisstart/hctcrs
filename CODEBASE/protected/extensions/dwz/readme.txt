������ʾ��ַ http://demo.dwzjs.com
DWZ���ʹ���ֲ� http://demo.dwzjs.com/doc/dwz-user-guide.pdf
Ajax������Ƶ�̲� http://demo.dwzjs.com/doc/dwz-ajax-develop.swf
DWZ�����ʾ��Ƶ http://demo.dwzjs.com/doc/dwz-user-guide.swf
----------------------------------------------------------------------
Dwz for Yiiʹ��˵����
1������dwz��Ӧ�õ�extĿ¼�¡�����config/main.php������
	'modules'=>array(
		'admin',
		'gii'=>array(
			'class'=>'system.gii.giiModule',
			'password'=>'admin',
			'generatorPaths'=>array(
				'ext.dwz.gii', //���Լ�����������·��
            ),
		),
	),
2����gii�½�module��������admin����ģ��һ��ѡdwz������adminģ�顣
3��������һ��ʹ��gii����crud��ֻҪ��ע��ģ��ѡ��dwz����


������
1��Dwz��ʼ������ DwzWidget��
2��navTab�ṹ�Ҽ� DwzNavTab��
3���ַ��ٹҼ� DwzAccordion��
4��tabs�Ҽ� DwzTabs��
5��panel�Ҽ� DwzPanel
6��Grid�Ҽ� DwzGrid
7��GridView�Ҽ� DwzGridView
7��js��ҳ��� DwzPager

ע��DwzTable�ʺ�֮�б������ã�DwzGrid����DWZ�ı������Ŀǰ���ǰ��Ʒ(��Ϊû�й��˺�����dwz����˵Ҫ��д���table�����ԵȰ�)��DwzGridview���ܺ�CgridView��ȫ��ͬ��ֻ�ǹ̶��˷�ҳ����
����Ŀǰ������DwzTalbe < DwzGrid < DwzGridView  ��^_^�벻Ҫͷ��)
֮����Ҫ��DwzTable��DwzGridֻ��������DWZ���ں�һ�㡣

DWZ����ʹ��ʵ����
1��ajax��ajax��ȡһ�������滻relָ�������ڵ�����
    CHtml::link('ajaxҳ��',url,array('target'=>'ajax','rel'=>'elementId'))

2��navTabTodo��ajax Post���ص�����ΪJSON��ʽ���ο�DWZ�ĵ��ġ���ͨ��Ajax���ύ������
    CHtml::link('text',url,array('target'=>'navTabTodo','title'=>'message'))

3��dialog��һ�������� ȫ����'max'=>ture�������ֲ���'mask'=>true,
    CHtml::link('�������д�',array('/admin/default/test'),array('target'=>'dialog','rel'=>'���ڱ�ʶ','title'=>'[�Զ������]','width'=>800, 'height'=>600));

4��navTab����navTab�д�һ����ǩ��Ҫʹ�ã�ҳ���б�������navTab�Ľṹ
    CHtml::link('��navTab�д�',url,array('target'=>'navTab','rel'=>'tab��ʶ��,��ͬ��ʶ�ŻḲ��֮ǰ��'))

5�������߶�����Ӧ��
    <div class="page">
      <div class="pageContent">
          <div class="pageFormContent" layoutH="56">����Ӧ�߶���<div>
          <div class="formBar">��������</div>
      </div>
      <div class="panelBar">
        <div class="row buttons">
          <?php echo CHtml::submitButton($model->isNewRecord ? '����' : '����'); ?>
        </div>
      </div>
    </div>
    
6��Input Alt���ı������ʾ
    CHtml::textField('name', '', array('alt'=>'����input alt��չ')); 

7�������ؼ���������
    CHtml::textField('name', '', array('class'=>'date','[pattern'=>'yyyy-mm-dd'.']','[yearstart'=>'-80'.']','[yearend'=>'5'.']')); 

8��tree��ֱ��ʹ��Cmenu�������ɣ���������£�
    <?php $this->widget('zii.widgets.CMenu',array(
      'activateParents'=>true,
      'htmlOptions'=>array('class'=>'tree treeFolder '),
      'items'=>array(
        array('label'=>'���¹���', 'url'=>array('/admin/articles/admin'),'items'=>array(
          array('label'=>'��������', 'url'=>array('/admin/articles/create'), 'linkOptions'=>array('target'=>'navTab','rel'=>'page1')),
          array('label'=>'�����б�', 'url'=>array('/admin/articles/index'), 'linkOptions'=>array('target'=>'navTab','rel'=>'page2')),
          array('label'=>'��������', 'url'=>array('/admin/articles/admin'), 'linkOptions'=>array('target'=>'navTab','rel'=>'page2')),
        )),
        array('label'=>'��Ŀ����', 'url'=>array('/admin/ArtCategory/'), 'linkOptions'=>array('target'=>'navTab','rel'=>'page5')),
      ),
    )); ?>
