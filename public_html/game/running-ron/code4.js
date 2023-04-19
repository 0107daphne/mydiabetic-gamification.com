gdjs.GAME_32OVERCode = {};
gdjs.GAME_32OVERCode.GDRightObjects1= [];
gdjs.GAME_32OVERCode.GDRightObjects2= [];
gdjs.GAME_32OVERCode.GDLeftObjects1= [];
gdjs.GAME_32OVERCode.GDLeftObjects2= [];
gdjs.GAME_32OVERCode.GDFoodsEarnedObjects1= [];
gdjs.GAME_32OVERCode.GDFoodsEarnedObjects2= [];
gdjs.GAME_32OVERCode.GDPlayerObjects1= [];
gdjs.GAME_32OVERCode.GDPlayerObjects2= [];
gdjs.GAME_32OVERCode.GDExpEarnedObjects1= [];
gdjs.GAME_32OVERCode.GDExpEarnedObjects2= [];
gdjs.GAME_32OVERCode.GDEXPObjects1= [];
gdjs.GAME_32OVERCode.GDEXPObjects2= [];
gdjs.GAME_32OVERCode.GDSignObjects1= [];
gdjs.GAME_32OVERCode.GDSignObjects2= [];
gdjs.GAME_32OVERCode.GDBridgeObjects1= [];
gdjs.GAME_32OVERCode.GDBridgeObjects2= [];
gdjs.GAME_32OVERCode.GDBridge2Objects1= [];
gdjs.GAME_32OVERCode.GDBridge2Objects2= [];
gdjs.GAME_32OVERCode.GDFoodsObjects1= [];
gdjs.GAME_32OVERCode.GDFoodsObjects2= [];
gdjs.GAME_32OVERCode.GDToNextLvlObjects1= [];
gdjs.GAME_32OVERCode.GDToNextLvlObjects2= [];
gdjs.GAME_32OVERCode.GDDoorTopObjects1= [];
gdjs.GAME_32OVERCode.GDDoorTopObjects2= [];
gdjs.GAME_32OVERCode.GDDoorMidObjects1= [];
gdjs.GAME_32OVERCode.GDDoorMidObjects2= [];
gdjs.GAME_32OVERCode.GDGreenFlagObjects1= [];
gdjs.GAME_32OVERCode.GDGreenFlagObjects2= [];
gdjs.GAME_32OVERCode.GDLadderTopObjects1= [];
gdjs.GAME_32OVERCode.GDLadderTopObjects2= [];
gdjs.GAME_32OVERCode.GDLadderMidObjects1= [];
gdjs.GAME_32OVERCode.GDLadderMidObjects2= [];
gdjs.GAME_32OVERCode.GDPlayObjects1= [];
gdjs.GAME_32OVERCode.GDPlayObjects2= [];
gdjs.GAME_32OVERCode.GDGameOverObjects1= [];
gdjs.GAME_32OVERCode.GDGameOverObjects2= [];
gdjs.GAME_32OVERCode.GDBorderObjects1= [];
gdjs.GAME_32OVERCode.GDBorderObjects2= [];
gdjs.GAME_32OVERCode.GDBorder2Objects1= [];
gdjs.GAME_32OVERCode.GDBorder2Objects2= [];

gdjs.GAME_32OVERCode.conditionTrue_0 = {val:false};
gdjs.GAME_32OVERCode.condition0IsTrue_0 = {val:false};
gdjs.GAME_32OVERCode.condition1IsTrue_0 = {val:false};
gdjs.GAME_32OVERCode.conditionTrue_1 = {val:false};
gdjs.GAME_32OVERCode.condition0IsTrue_1 = {val:false};
gdjs.GAME_32OVERCode.condition1IsTrue_1 = {val:false};


gdjs.GAME_32OVERCode.eventsList0 = function(runtimeScene) {

{


gdjs.GAME_32OVERCode.condition0IsTrue_0.val = false;
{
{gdjs.GAME_32OVERCode.conditionTrue_1 = gdjs.GAME_32OVERCode.condition0IsTrue_0;
gdjs.GAME_32OVERCode.conditionTrue_1.val = runtimeScene.getOnceTriggers().triggerOnce(9757716);
}
}if (gdjs.GAME_32OVERCode.condition0IsTrue_0.val) {
{gdjs.evtTools.sound.playSound(runtimeScene, "game_over.ogg", false, 100, 1);
}}

}


{


gdjs.GAME_32OVERCode.condition0IsTrue_0.val = false;
{
gdjs.GAME_32OVERCode.condition0IsTrue_0.val = gdjs.evtTools.input.isMouseButtonPressed(runtimeScene, "Left");
}if (gdjs.GAME_32OVERCode.condition0IsTrue_0.val) {
{gdjs.evtTools.runtimeScene.replaceScene(runtimeScene, "LEVEL 1", false);
}}

}


};

gdjs.GAME_32OVERCode.func = function(runtimeScene) {
runtimeScene.getOnceTriggers().startNewFrame();

gdjs.GAME_32OVERCode.GDRightObjects1.length = 0;
gdjs.GAME_32OVERCode.GDRightObjects2.length = 0;
gdjs.GAME_32OVERCode.GDLeftObjects1.length = 0;
gdjs.GAME_32OVERCode.GDLeftObjects2.length = 0;
gdjs.GAME_32OVERCode.GDFoodsEarnedObjects1.length = 0;
gdjs.GAME_32OVERCode.GDFoodsEarnedObjects2.length = 0;
gdjs.GAME_32OVERCode.GDPlayerObjects1.length = 0;
gdjs.GAME_32OVERCode.GDPlayerObjects2.length = 0;
gdjs.GAME_32OVERCode.GDExpEarnedObjects1.length = 0;
gdjs.GAME_32OVERCode.GDExpEarnedObjects2.length = 0;
gdjs.GAME_32OVERCode.GDEXPObjects1.length = 0;
gdjs.GAME_32OVERCode.GDEXPObjects2.length = 0;
gdjs.GAME_32OVERCode.GDSignObjects1.length = 0;
gdjs.GAME_32OVERCode.GDSignObjects2.length = 0;
gdjs.GAME_32OVERCode.GDBridgeObjects1.length = 0;
gdjs.GAME_32OVERCode.GDBridgeObjects2.length = 0;
gdjs.GAME_32OVERCode.GDBridge2Objects1.length = 0;
gdjs.GAME_32OVERCode.GDBridge2Objects2.length = 0;
gdjs.GAME_32OVERCode.GDFoodsObjects1.length = 0;
gdjs.GAME_32OVERCode.GDFoodsObjects2.length = 0;
gdjs.GAME_32OVERCode.GDToNextLvlObjects1.length = 0;
gdjs.GAME_32OVERCode.GDToNextLvlObjects2.length = 0;
gdjs.GAME_32OVERCode.GDDoorTopObjects1.length = 0;
gdjs.GAME_32OVERCode.GDDoorTopObjects2.length = 0;
gdjs.GAME_32OVERCode.GDDoorMidObjects1.length = 0;
gdjs.GAME_32OVERCode.GDDoorMidObjects2.length = 0;
gdjs.GAME_32OVERCode.GDGreenFlagObjects1.length = 0;
gdjs.GAME_32OVERCode.GDGreenFlagObjects2.length = 0;
gdjs.GAME_32OVERCode.GDLadderTopObjects1.length = 0;
gdjs.GAME_32OVERCode.GDLadderTopObjects2.length = 0;
gdjs.GAME_32OVERCode.GDLadderMidObjects1.length = 0;
gdjs.GAME_32OVERCode.GDLadderMidObjects2.length = 0;
gdjs.GAME_32OVERCode.GDPlayObjects1.length = 0;
gdjs.GAME_32OVERCode.GDPlayObjects2.length = 0;
gdjs.GAME_32OVERCode.GDGameOverObjects1.length = 0;
gdjs.GAME_32OVERCode.GDGameOverObjects2.length = 0;
gdjs.GAME_32OVERCode.GDBorderObjects1.length = 0;
gdjs.GAME_32OVERCode.GDBorderObjects2.length = 0;
gdjs.GAME_32OVERCode.GDBorder2Objects1.length = 0;
gdjs.GAME_32OVERCode.GDBorder2Objects2.length = 0;

gdjs.GAME_32OVERCode.eventsList0(runtimeScene);
return;

}

gdjs['GAME_32OVERCode'] = gdjs.GAME_32OVERCode;
